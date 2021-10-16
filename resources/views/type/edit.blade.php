@extends('layout.main')

@section('tittle', 'Portofolio | Berniaga Bali')
@section('container')

            <main class="px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="h2">Edit Type</h1>
                    <a class="btn btn-link" href="{{ route('type.index') }}">Kembali ke Daftar Type</a>
                </div>

                <div class="row g-5">
                    <div class="col-md-12 col-lg-12">
                        <form action="{{ route('type.update', $type->id) }}" class="needs-validation" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-12">
                                    <label for="nama_type" class="form-label">Nama Type</label>
                                    <input type="text" class="form-control" name="nama_type" placeholder="" value="{{ $type->nama_type }}" required>
                                </div>

                                <div class="col-sm-12">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" placeholder="" value="">{{ $type->deskripsi }}</textarea>
                                </div>

                                <div class="col-sm-12">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option @if($type->status == 'Aktif') selected @endif value="Aktif">Aktif</option>
                                        <option @if($type->status == 'Nonaktif') selected @endif value="Nonaktif">Nonaktif</option>
                                    </select>
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
    $(document).ready(function() {
        // 
    })
</script>
@endsection