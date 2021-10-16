<?php

namespace App\Http\Controllers;

use App\Models\st_Cabang;
use App\Models\st_Transaksi;
use App\Models\Type;
use App\Models\Stok;
use App\Models\FotoStok;
use DataTables;
use Illuminate\Http\Request;
use Hashids\Hashids;
use Illuminate\Support\Facades\Storage;

class StokController extends Controller
{
    private $hashids;

    public function __construct(Hashids $hashids)
    {
        $this->hashids = new Hashids('', 32);
    }

    public function index()
    {
    	$stok = Stok::all();

    	return view('stok.index', compact('stok'));
    }

    public function list()
    {
        $stok = Stok::all();
        // dd($stok);

        return DataTables::of($stok)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $actionBtn = "<a href='" . route('stok.edit', $row['id_hash']) . "' class='btn btn-warning btn-sm me-1'><i class='fa fa-edit'></i></a>";
                $actionBtn .= "<a data-id='" . $row['id_hash'] . "' class='delete_stok btn btn-danger btn-sm'><i class='fa fa-times'></i></a>";
                return $actionBtn;
            })
            ->addColumn('type', function($row) {
                return $row['nama_type'];
            })
            ->editColumn('harga', function($row) {
                return 'Rp. ' . number_format($row['harga'], 0, '', '.');
            })
            ->editColumn('status', function($row) {
                $status = $row['status'] == 'Tersedia' ? 'success' : 'danger';
                return "<span class='badge bg-" . $status . "'>" . $row['status'] . "</span>";
            })
            ->editColumn('foto', function($row) {
                return "<img src='" . $row['foto_utama'] . "' width='128px'>";
            })
            ->rawColumns(['action', 'foto', 'status'])
            ->make(true);
    }

    public function create()
    {
        $type = Type::aktif();
    	return view('stok.create', compact('type'));
    }

    public function store(Request $request)
    {
    	$stok = Stok::create([
    		'judul' => $request->judul,
    		'harga' => str_replace(".", "", $request->harga),
    		'size' => $request->size,
    		'id_type' => $request->id_type,
    		'keterangan' => $request->keterangan,
    		'diskon' => NULL,
            'status' => 'Tersedia'
    	]);

    	// $images = $request->images;

    	// foreach($images as $key => $image) {
    	// 	$foto_utama = $key === array_key_first($images) ? 1 : 0;

    	// 	$path = $image->store('stok', 'public');

    	// 	$foto_stok = FotoStok::create([
    	// 		'id_stok' => $stok->id,
    	// 		'path' => $path,
    	// 		'foto_utama' => $foto_utama
    	// 	]);
    	// }

    	return redirect()->route('stok.edit', $stok->id_hash);
    }

    public function edit($id)
    {
        $id_stok = $this->hashids->decode($id)[0] ?? 0;
        $stok = Stok::findOrFail($id_stok);
        $type = Type::aktif();

        return view('stok.edit', compact('stok', 'id', 'type'));
    }

    public function update(Request $request, $id)
    {
        $id_stok = $this->hashids->decode($id)[0] ?? 0;
        $stok = Stok::findOrFail($id_stok);

        $data = [
            'judul' => $request->judul,
            'harga' => str_replace(".", "", $request->harga),
            'size' => $request->size,
            'id_type' => $request->id_type,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
        ];

        if($request->rd_diskon == true && $request->diskon > 0 && $request->diskon != NULL) {
            $data['diskon'] = $request->diskon;
        } else {
            $data['diskon'] = NULL;
        }

        $stok->update($data);

        return redirect()->route('stok.index');
    }

    public function foto($id)
    {
        $id_stok = $this->hashids->decode($id)[0] ?? 0;
        $stok = Stok::findOrFail($id_stok);

        return DataTables::of($stok->foto)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $actionBtn = "<a data-id='" . $row['id'] . "' class='delete_foto btn btn-danger btn-sm'><i class='fa fa-times'></i></a>";
                return $actionBtn;
            })
            ->addColumn('foto_utama', function($row) {
                $isChecked = $row['foto_utama'] == true ? ' checked ' : ' ';
                $actionBtn = "<input class='form-check-input' name='foto_utama' type='radio'" . $isChecked . "value='" . $row['id'] . "'>";
                return $actionBtn;
            })
            ->editColumn('foto', function($row) {
                $foto = "<a href='" . asset('storage/' . $row['path']) . "'><img src='". asset('storage/' . $row['path']) . "' width='128px'></a>";
                return $foto;
            })
            ->rawColumns(['action', 'foto', 'foto_utama'])
            ->make(true);
    }

    public function fotoUtama(Request $request, $id)
    {
        try {
            $id_stok = $this->hashids->decode($id)[0] ?? 0;
            $stok = Stok::find($id_stok);

            if($stok) {
                $foto_utama = $stok->foto->where('foto_utama', 1)->first();
                if($foto_utama != $request->foto_utama) {
                    foreach($stok->foto as $foto) {
                        $foto->update(['foto_utama' => 0]);
                    }

                    $stok->foto->find($request->foto_utama)->update(['foto_utama' => 1]);

                    return response()->json([
                        "success" => "Berhasil mengubah foto utama",
                    ], 200);
                } else {
                    return response()->json([
                        "error" => "Foto utama sama dengan yang dipilih sebelumnya",
                    ], 422);
                }
            } else {
                return response()->json([
                    "error" => "Stok tidak ditemukan, tidak dapat mengubah foto utama",
                ], 404);
            }
        } catch(\Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
            ], 422);
        }
    }

    public function upload(Request $request, $id)
    {
        try {
            $id_stok = $this->hashids->decode($id)[0] ?? 0;
            $stok = Stok::find($id_stok);

            if($stok) {
                $foto_utama = $stok->foto->first() == NULL ? 1 : 0;

                $file = $request->file('file');
                $foto_stok = FotoStok::create([
                    'id_stok' => $stok->id,
                    'path' => $file->store('stok', 'public'),
                    'foto_utama' => $foto_utama
                ]);
            } else {
                return response()->json([
                    "error" => "Stok tidak ditemukan, tidak dapat mengunggah file",
                ], 404);
            }
        } catch(\Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
            ], 422);
        }
    }

    public function deleteFoto(Request $request, $id)
    {
        try {
            $id_stok = $this->hashids->decode($id)[0] ?? 0;
            $stok = Stok::find($id_stok);

            if($stok) {
                $foto = $stok->foto->find($request->foto);
                
                if($foto) {
                    $foto_utama = $foto->foto_utama;
                    Storage::disk('public')->delete($foto->path);
                    $foto->delete();

                    if($foto_utama == 1 && count($stok->foto) > 1) {
                        $stok->foto->where('id', '!=', $request->foto)->first()->update(['foto_utama' => 1]);
                    }

                    return response()->json([
                        "success" => "Berhasil menghapus foto",
                    ], 200);
                } else {
                    return response()->json([
                        "error" => "Foto tidak ditemukan",
                    ], 404);
                }
            } else {
                return response()->json([
                    "error" => "Stok tidak ditemukan, tidak dapat menghapus foto",
                ], 404);
            }
        } catch(\Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
            ], 422);
        }
    }

    public function destroy(Request $request, $id)
    {
        $id_stok = $this->hashids->decode($id)[0] ?? 0;
        $stok = Stok::find($id_stok);

        if(!$stok) {
            return response()->json([
                'message' => 'Stok gagal dihapus karena sudah tidak tersedia'
            ]);
        }

        foreach($stok->foto as $foto) {
            Storage::disk('public')->delete($foto->path);
        }

        $stok->delete();

        return response()->json([
            'message' => 'Stok berhasil dihapus'
        ], 200);
    }
}
