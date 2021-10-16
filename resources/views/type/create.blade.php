@extends('layout.main')

@section('tittle', 'Portofolio | Berniaga Bali')
@section('container')

            <main class="px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="h2">Tambah Type</h1>
                    <a class="btn btn-link" href="{{ route('type.index') }}">Kembali ke Daftar Type</a>
                </div>

                <div class="row g-5">
                    <div class="col-md-12 col-lg-12">
                        <form action="{{ route('type.store') }}" class="needs-validation" enctype="multipart/form-data" method="POST" novalidate>
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-12">
                                    <label for="nama_type" class="form-label">Nama Type</label>
                                    <input type="text" class="form-control" name="nama_type" placeholder="" value="" required>
                                </div>

                                <div class="col-sm-12">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" placeholder="" value=""></textarea>
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
