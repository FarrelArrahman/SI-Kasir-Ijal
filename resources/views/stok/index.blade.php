@extends('layout.main')

@section('tittle', 'Portofolio | Berniaga Bali')
@section('container')
            <main class="p-4">
                <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    
                </div> -->

                <div class="d-flex row pt-3 pb-2 mb-3">
                    <div class="col-md-6">
                        <h1 class="h2">Stok Stainless Bali</h1>
                    </div>
                </div>

                <div class="col-md-12">
                    <a href="{{ route('stok.create') }}" class="btn btn-block btn-success d-grid">Input Stok Baru</a>
                </div>

                <div class="row mt-3" id="table_pemasukan">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">Daftar Stok</h6>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="table-stok" class="table table-bordered table-hover datatable">
                                    <thead>
                                        <tr>
                                            <th width="50px">#</th>
                                            <th width="128px">Foto</th>
                                            <th>Judul</th>
                                            <th width="50px">Type</th>
                                            <th width="50px">Status</th>
                                            <th width="100px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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

            async function getStok() {
                var url = "{{ route('stok.list') }}"

                table.destroy()

                table = $('#table-stok').DataTable({
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
                            data: 'judul', 
                            name: 'judul', 
                        },
                        {
                            data: 'type', 
                            name: 'type', 
                        },
                        {
                            data: 'status', 
                            name: 'status',
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

            async function deleteStok(id) {
                var url = "{{ route('stok.destroy', '') }}/" + id

                let _data = {
                    _token: "{{ csrf_token() }}",
                }

                let response = await fetch(url, {
                    method: 'DELETE',
                    body: JSON.stringify(_data),
                    headers: {
                        "Content-Type": "application/json"
                    }
                })

                let result = await response.json()
                console.log(result)

                getStok()
            }

            $('#table-stok').on('click', '.delete_stok', async function(e) {
                // console.log($(this).data('id'))
                Swal.fire({
                    title: 'Apakah Anda yakin ingin menghapus stok ini?',
                    showDenyButton: true,
                    confirmButtonText: `Hapus`,
                    denyButtonText: `Batal`,
                    icon: 'warning'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteStok($(this).data('id'))
                        Swal.fire('Stok telah dihapus.', '', 'success')
                    }
                })
            })

            getStok()
        })
    </script>
@endsection
