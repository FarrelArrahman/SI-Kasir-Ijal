@extends('layout.main')

@section('tittle', 'Portofolio | Berniaga Bali')
@section('container')
            <main class="p-4">
                <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    
                </div> -->

                <div class="d-flex row pt-3 pb-2 mb-3">
                    <div class="col-md-6">
                        <h1 class="h2">Type Produk</h1>
                    </div>
                </div>

                <div class="col-md-12">
                    <a href="{{ route('type.create') }}" class="btn btn-block btn-success d-grid">Input Type Baru</a>
                </div>

                <div class="row mt-3" id="table_pemasukan">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">Daftar Type</h6>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="table-stok" class="table table-bordered table-hover datatable">
                                    <thead>
                                        <tr>
                                            <th width="50px">#</th>
                                            <th width="128px">Nama Type</th>
                                            <th>Deskripsi</th>
                                            <th class="text-center" width="50px">Status</th>
                                            <th class="text-center" width="100px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($type as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_type }}</td>
                                            <td>{{ $item->deskripsi ?? '-' }}</td>
                                            <td class="text-center">@if($item->status == 'Aktif')
                                                <span class="badge bg-success">{{ $item->status }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $item->status }}</span>
                                            @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('type.edit', $item->id) }}" class='btn btn-warning btn-sm me-1'><i class='fa fa-edit'></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </main>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#title-badung').hide()
            $('#pembagian-badung').hide()

            var table = $("#table-stok").DataTable()
        })
    </script>
@endsection
