@extends('layout.main')

@section('tittle', 'Portofolio | Berniaga Bali')
@section('container')

            <main class="px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="h2">Tambah Produk Custom</h1>
                    <a class="btn btn-link" href="{{ route('produk_custom.index') }}">Kembali ke Daftar Produk Custom</a>
                </div>

                <div class="row g-5">
                    <div class="col-md-12 col-lg-12">
                        <form action="{{ route('produk_custom.store') }}" class="needs-validation" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-8">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" class="form-control" name="judul" placeholder="" value="" required>
                                </div>

                                <div class="col-sm-4">
                                    <label for="type" class="form-label">Type</label>
                                    <div class="input-group has-validation">
                                        <!-- <input type="text" class="form-control" name="type" placeholder="" required> -->
                                        <select class="form-select" name="id_type" required="">
                                            <option value="" selected="" disabled="">-- Pilih Type --</option>
                                            @foreach($type as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" placeholder="" value=""></textarea>
                                </div>

                                <div class="col-sm-12">
                                    <button id="tambah" class="btn btn-primary float-end" type="submit">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.money').mask('000.000.000', {reverse: true})
            // $('.input-images').imageUploader();
        })
    </script>
@endsection
