@extends('layout.main')

@section('tittle', 'Portofolio | Berniaga Bali')
@section('container')

            <main class="px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="h2">Edit atau Tambah Foto Produk</h1>
                    <a class="btn btn-link" href="{{ route('stok.index') }}">Kembali ke Daftar Stok</a>
                </div>

                <div class="row g-5">
                    <div class="col-md-12 col-lg-12">
                        <form action="{{ route('stok.update', $stok->id_hash) }}" class="needs-validation" enctype="multipart/form-data" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-12">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" class="form-control" name="judul" placeholder="" value="{{ $stok->judul }}" required>
                                </div>

                                <div class="col-sm-4">
                                    <label for="harga" class="form-label">Harga</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" class="money form-control" name="harga" value="{{ $stok->harga }}" placeholder="" required>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="size" class="form-label">Size</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="size" placeholder="" value="{{ $stok->size }}" required>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="type" class="form-label">Type</label>
                                    <div class="input-group has-validation">
                                        <select class="form-select" name="id_type">
                                            <option value="" selected="" disabled="">-- Pilih Type --</option>
                                            @foreach($type as $item)
                                            <option {{ $item->nama_type == $stok->type->nama_type ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nama_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" name="rd_diskon" id="rd_diskon" value="true">
                                        <label for="rd_diskon" class="form-check-label">Tambahkan Diskon?</label>
                                    </div>
                                    <div class="form-inline">
                                        <div id="jumlah_diskon" class="input-group has-validation">
                                            <input id="input_jumlah_diskon" type="text" class="money form-control" name="diskon" placeholder="Jumlah diskon (tanpa %)">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" placeholder="" value="">{{ $stok->keterangan }}</textarea>
                                </div>

                                <div class="col-sm-12">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option @if($stok->status == 'Tersedia') selected @endif value="Tersedia">Tersedia</option>
                                        <option @if($stok->status == 'Tidak Tersedia') selected @endif value="Tidak Tersedia">Tidak Tersedia</option>
                                    </select>
                                </div>

                                <div class="col-sm-12">
                                    <label for="foto" class="form-label">Foto</label>

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="daftar-foto-tab" data-bs-toggle="tab" data-bs-target="#daftar-foto" type="button" role="tab" aria-controls="daftar-foto" aria-selected="true">Daftar Foto</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="upload-foto-tab" data-bs-toggle="tab" data-bs-target="#upload-foto" type="button" role="tab" aria-controls="upload-foto" aria-selected="false">Upload Foto Baru</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="daftar-foto" role="tabpanel" aria-labelledby="daftar-foto">
                                            <br>
                                            <table id="table-foto" class="table table-bordered table-hover datatable">
                                                <thead>
                                                    <tr>
                                                        <th width="10px">#</th>
                                                        <th>Foto</th>
                                                        <th width="100px" class="text-center">Foto Utama</th>
                                                        <th width="50px">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="upload-foto" role="tabpanel" aria-labelledby="upload-foto-tab">
                                            <div class="dropzone dropzone-previews" id="my-awesome-dropzone"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <button class="btn btn-primary float-end" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

@section('js')
<script type="text/javascript">
    Dropzone.autoDiscover = false;
    $(document).ready(function() {
        var table = $("#table-foto").DataTable()
        var diskon = '{{ $stok->diskon }}'
        var rdDiskon = $('#rd_diskon')
        var jumlahDiskon = $('#jumlah_diskon')
        var inputJumlahDiskon = $('#input_jumlah_diskon')

        if(diskon != '') {
            rdDiskon.prop('checked', true)
            jumlahDiskon.show()
            inputJumlahDiskon.val(diskon)
        } else {
            rdDiskon.prop('checked', false)
            jumlahDiskon.hide()
        }
        
        $('.money').mask('000.000.000', {reverse: true})

        $('#rd_diskon').change(function () {
            var isChecked = $(this).is(':checked')

            if(isChecked) {
                jumlahDiskon.show()
            } else {
                jumlahDiskon.hide()
            }
        })

        $("#my-awesome-dropzone").dropzone({
            url: "{{ route('stok.upload', $id) }}",
            acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            init: function () {
                this.on("queuecomplete", function (file) {
                    getFoto()
                    this.removeAllFiles()
                })
            },
        });

        async function getFoto() {
            var url = "{{ route('stok.foto', $id) }}"

            table.destroy()

            table = $('#table-foto').DataTable({
                autoWidth: false,
                processing: true,
                serverSide: true,
                ajax: url,
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {
                        data: 'foto', 
                        name: 'foto', 
                        orderable: false, 
                        searchable: false
                    },
                    {
                        data: 'foto_utama', 
                        name: 'foto_utama', 
                        orderable: false, 
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'action', 
                        name: 'action', 
                        orderable: false, 
                        searchable: false,
                        className: 'text-center'
                    },
                ]
            })
        }

        $('#table-foto').on('click', '.delete_foto', async function(e) {
            // console.log($(this).data('id'))
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus foto ini?',
                showDenyButton: true,
                confirmButtonText: `Hapus`,
                denyButtonText: `Batal`,
                icon: 'warning'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteFoto($(this).data('id'))
                    Swal.fire('Foto telah dihapus.', '', 'success')
                }
            })
        })

        $('#table-foto').on('change', 'input[type=radio][name=foto_utama]', function() {
            setFotoUtama(this.value)
        });

        async function setFotoUtama(id_foto) {
            var url = "{{ route('stok.fotoUtama', $id) }}/"

            let _data = {
                _token: "{{ csrf_token() }}",
                foto_utama: id_foto
            }

            let response = await fetch(url, {
                method: 'PUT',
                body: JSON.stringify(_data),
                headers: {
                    "Content-Type": "application/json"
                }
            })

            // let result = await response.json()
            // console.log(result)
        }

        async function deleteFoto(id_foto) {
            var url = "{{ route('stok.deleteFoto', $id) }}/"

            let _data = {
                _token: "{{ csrf_token() }}",
                foto: id_foto
            }

            let response = await fetch(url, {
                method: 'DELETE',
                body: JSON.stringify(_data),
                headers: {
                    "Content-Type": "application/json"
                }
            })

            // let result = await response.json()
            // console.log(result)

            getFoto()
        }

        getFoto()
    })
</script>
@endsection