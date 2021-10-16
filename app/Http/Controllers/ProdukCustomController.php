<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\ProdukCustom;
use App\Models\FotoProdukCustom;
use DataTables;
use Hashids\Hashids;
use Illuminate\Support\Facades\Storage;

class ProdukCustomController extends Controller
{
    private $hashids;

    public function __construct(Hashids $hashids)
    {
        $this->hashids = new Hashids('', 32);
    }

    public function index()
    {
    	$produkCustom = ProdukCustom::all();

    	return view('produk_custom.index', compact('produkCustom'));
    }

    public function list()
    {
        $produkCustom = ProdukCustom::all();
        // dd($produkCustom);

        return DataTables::of($produkCustom)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $actionBtn = "<a href='" . route('produk_custom.edit', $row['id_hash']) . "' class='btn btn-warning btn-sm me-1'><i class='fa fa-edit'></i></a>";
                $actionBtn .= "<a data-id='" . $row['id_hash'] . "' class='delete_produk_custom btn btn-danger btn-sm'><i class='fa fa-times'></i></a>";
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
    	return view('produk_custom.create', compact('type'));
    }

    public function store(Request $request)
    {
    	$produkCustom = ProdukCustom::create([
    		'judul' => $request->judul,
    		'id_type' => $request->id_type,
    		'keterangan' => $request->keterangan,
            'status' => 'Tersedia'
    	]);

    	return redirect()->route('produk_custom.edit', $produkCustom->id_hash);
    }

    public function edit($id)
    {
        $id_produk_custom = $this->hashids->decode($id)[0] ?? 0;
        $produkCustom = ProdukCustom::findOrFail($id_produk_custom);
        $type = Type::aktif();

        return view('produk_custom.edit', compact('produkCustom', 'id', 'type'));
    }

    public function update(Request $request, $id)
    {
        $id_produk_custom = $this->hashids->decode($id)[0] ?? 0;
        $produkCustom = ProdukCustom::findOrFail($id_produk_custom);

        $data = [
            'judul' => $request->judul,
            'id_type' => $request->id_type,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
        ];

        $produkCustom->update($data);

        return redirect()->route('produk_custom.index');
    }

    public function foto($id)
    {
        $id_produk_custom = $this->hashids->decode($id)[0] ?? 0;
        $produkCustom = ProdukCustom::findOrFail($id_produk_custom);

        return DataTables::of($produkCustom->foto)
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
            $id_produk_custom = $this->hashids->decode($id)[0] ?? 0;
            $produkCustom = ProdukCustom::find($id_produk_custom);

            if($produkCustom) {
                $foto_utama = $produkCustom->foto->where('foto_utama', 1)->first();
                if($foto_utama != $request->foto_utama) {
                    foreach($produkCustom->foto as $foto) {
                        $foto->update(['foto_utama' => 0]);
                    }

                    $produkCustom->foto->find($request->foto_utama)->update(['foto_utama' => 1]);

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
                    "error" => "Produk Custom tidak ditemukan, tidak dapat mengubah foto utama",
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
            $id_produk_custom = $this->hashids->decode($id)[0] ?? 0;
            $produkCustom = ProdukCustom::find($id_produk_custom);

            if($produkCustom) {
                $foto_utama = $produkCustom->foto->first() == NULL ? 1 : 0;

                $file = $request->file('file');
                $foto_produk_custom = FotoProdukCustom::create([
                    'id_produk_custom' => $produkCustom->id,
                    'path' => $file->store('produk_custom', 'public'),
                    'foto_utama' => $foto_utama
                ]);
            } else {
                return response()->json([
                    "error" => "Produk Custom tidak ditemukan, tidak dapat mengunggah file",
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
            $id_produk_custom = $this->hashids->decode($id)[0] ?? 0;
            $produkCustom = ProdukCustom::find($id_produk_custom);

            if($produkCustom) {
                $foto = $produkCustom->foto->find($request->foto);
                
                if($foto) {
                    $foto_utama = $foto->foto_utama;
                    Storage::disk('public')->delete($foto->path);
                    $foto->delete();

                    if($foto_utama == 1 && count($produkCustom->foto) > 1) {
                        $produkCustom->foto->where('id', '!=', $request->foto)->first()->update(['foto_utama' => 1]);
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
                    "error" => "Produk Custom tidak ditemukan, tidak dapat menghapus foto",
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
        $id_produk_custom = $this->hashids->decode($id)[0] ?? 0;
        $produkCustom = ProdukCustom::find($id_produk_custom);

        if(!$produkCustom) {
            return response()->json([
                'message' => 'Produk Custom gagal dihapus karena sudah tidak tersedia'
            ]);
        }

        foreach($produkCustom->foto as $foto) {
            Storage::disk('public')->delete($foto->path);
        }

        $produkCustom->delete();

        return response()->json([
            'message' => 'Produk Custom berhasil dihapus'
        ], 200);
    }
}
