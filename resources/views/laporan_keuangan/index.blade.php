<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.87.0">
        <title>Laporan Keuangan</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.min.css" integrity="sha512-FEQLazq9ecqLN5T6wWq26hCZf7kPqUbFC9vsHNbXMJtSZZWAcbJspT+/NEAQkBfFReZ8r9QlA9JHaAuo28MTJA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        
        <!-- Custom styles for this template -->
        <style type="text/css">
            .bd-placeholder-img{font-size:1.125rem;text-anchor:middle;-webkit-user-select:none;-moz-user-select:none;user-select:none}@media (min-width:768px){.bd-placeholder-img-lg{font-size:3.5rem}}body{font-size:.875rem}.feather{width:16px;height:16px;vertical-align:text-bottom}.sidebar{position:fixed;top:0;bottom:0;left:0;z-index:100;padding:48px 0 0;box-shadow:inset -1px 0 0 rgba(0,0,0,.1)}@media (max-width:767.98px){.sidebar{top:5rem}}.sidebar-sticky{position:relative;top:0;height:calc(100vh - 48px);padding-top:.5rem;overflow-x:hidden;overflow-y:auto}.sidebar .nav-link{font-weight:500;color:#333}.sidebar .nav-link .feather{margin-right:4px;color:#727272}.sidebar .nav-link.active{color:#2470dc}.sidebar .nav-link.active .feather,.sidebar .nav-link:hover .feather{color:inherit}.sidebar-heading{font-size:.75rem;text-transform:uppercase}.navbar-brand{padding-top:.75rem;padding-bottom:.75rem;font-size:1rem;background-color:rgba(0,0,0,.25);box-shadow:inset -1px 0 0 rgba(0,0,0,.25)}.navbar .navbar-toggler{top:.25rem;right:1rem}.navbar .form-control{padding:.75rem 1rem;border-width:0;border-radius:0}.form-control-dark{color:#fff;background-color:rgba(255,255,255,.1);border-color:rgba(255,255,255,.1)}.form-control-dark:focus{border-color:transparent;box-shadow:0 0 0 3px rgba(255,255,255,.25)}
        </style>
    </head>
    <body>
    
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                            <span data-feather="home"></span>
                            Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="shopping-cart"></span>
                            Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="users"></span>
                            Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2"></span>
                            Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="layers"></span>
                            Integrations
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Saved reports</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Current month
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Last quarter
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Social engagement
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Year-end sale
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    
                </div> -->

                <div class="d-flex row pt-3 pb-2 mb-3">
                        <div class="col-md-6">
                            <h1 class="h2">Laporan Keuangan</h1>
                        </div>
                        <div class="col-md-6">
                            <form class="row gy-2 gx-3 align-items-center">
                                <div class="col-sm-4">
                                    <label class="visually-hidden" for="month">Month</label>
                                    <select class="form-select" id="month">
                                        @foreach($month as $key => $value)
                                        <option @if(now()->month == $key) selected @endif value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label class="visually-hidden" for="year">Year</label>
                                    <select class="form-select" id="year">
                                        @foreach($year as $value)
                                        <option @if(now()->year == $value) selected @endif value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label class="visually-hidden" for="type">Type</label>
                                    <select class="form-select bg-primary text-white" id="type">
                                        <option value="income" selected>Pemasukan</option>
                                        <option value="expenses">Pengeluaran</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="table-responsive mt-3">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Pemasukan Kotor</td>
                                    <td id="total_pemasukan_kotor" width="30%" scope="col">Rp. 0</td>
                                </tr>
                                <tr>
                                    <td>Total Modal</td>
                                    <td id="total_modal" width="30%" scope="col">Rp. 0</td>
                                </tr>
                                <tr>
                                    <td>Pemasukan Bersih</td>
                                    <td id="total_pemasukan">Rp. 0</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="table-responsive mt-3">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Pembagian 1 60%</td>
                                    <td id="pembagian1" width="30%" scope="col">Rp. 0</td>
                                </tr>
                                <tr>
                                    <td>Pembagian 2 40%</td>
                                    <td id="pembagian2">Rp. 0</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <a href="{{ route('transaksi_pembelian') }}" class="btn btn-block btn-success d-grid">Input Pemasukan</a>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">DataTable Pemasukan</h6>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="table-laporan" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>Nama Transaksi</th>
                                            <th>Total Harga</th>
                                            <th>Total Modal</th>
                                            <th>Keuntungan Bersih</th>
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
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalDetailTransaksi" tabindex="-1" aria-labelledby="modalDetailTransaksiLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="save_data_pembeli">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailTransaksiLabel">Detail Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="nama_pembeli" class="col-form-label">Nama</label>
                                <p id="nama_pembeli" class="fs-5">-</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="no_telp" class="col-form-label">No Telp</label>
                                <p id="no_telp" class="fs-5">-</p>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="alamat" class="col-form-label">Alamat</label>
                                <p id="alamat" class="fs-5">-</p>
                            </div>                            
                        </div>

                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="5%" scope="col">#</th>
                                            <th width="10%" scope="col">Date</th>
                                            <th width="42.5%" scope="col">Nama Barang</th>
                                            <th width="17.5%" scope="col">Harga Modal</th>
                                            <th width="17.5%" scope="col">Harga Jual</th>
                                            <th width="7.5%" scope="col">Unit</th>
                                        </tr>
                                    </thead>
                                    <tbody id="barang_transaksi">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var month = $('#month').val()
            var year = $('#year').val()
            var type = $('#type').val()
            var table = $("#table-laporan").DataTable()

            async function getTransaksiLaporan(month, year, type) {
                const param = {
                    month: month,
                    year: year,
                    type: type 
                }

                var url = `{{ route('transaksi_laporan_keuangan') }}?month=${encodeURIComponent(param.month)}&year=${encodeURIComponent(param.year)}&type=${encodeURIComponent(param.type)}`

                table.destroy()

                table = $('#table-laporan').DataTable({
                    autoWidth: false,
                    processing: true,
                    serverSide: true,
                    ajax: url,
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'tanggal', name: 'tanggal'},
                        {data: 'id_transaksi', name: 'id_transaksi'},
                        {data: 'total_harga', name: 'total_harga'},
                        {data: 'total_modal', name: 'total_modal'},
                        {data: 'keuntungan_bersih', name: 'keuntungan_bersih'},
                        {
                            data: 'action', 
                            name: 'action', 
                            orderable: false, 
                            searchable: false
                        },
                    ]
                })
            }

            async function getLaporanKeuangan(month, year, type) {
                const param = {
                    month: month,
                    year: year,
                    type: type 
                }

                var url = `{{ route('laporan_keuangan') }}?month=${encodeURIComponent(param.month)}&year=${encodeURIComponent(param.year)}&type=${encodeURIComponent(param.type)}`

                try {
                    let response = await fetch(url)

                    if(response.status === 200) {
                        let result = await response.json()

                        return result.data
                    }

                } catch (error) {
                    console.log(error)
                }
            }

            async function setLaporanKeuangan(month, year, type) {
                var laporan = await getLaporanKeuangan(month, year, type)
                
                if( ! jQuery.isEmptyObject(laporan)) {    
                    $('#total_modal').text(laporan.total_modal)
                    $('#total_pemasukan').text(laporan.total_pemasukan)
                    $('#total_pemasukan_kotor').text(laporan.total_harga)
                    $('#total_kas_besar').text(laporan.total_kas_besar)
                    $('#sisa_utang_modal').text(laporan.sisa_utang_modal)
                    $('#pembagian1').text(laporan.pembagian1)
                    $('#pembagian2').text(laporan.pembagian2)
                } else {
                    $('#total_modal').text("Rp. 0")
                    $('#total_pemasukan').text("Rp. 0")
                    $('#total_pemasukan_kotor').text("Rp. 0")
                    $('#total_kas_besar').text("Rp. 0")
                    $('#sisa_utang_modal').text("Rp. 0")
                    $('#pembagian1').text("Rp. 0")
                    $('#pembagian2').text("Rp. 0")
                }
            }

            async function getBarangTransaksi(id_transaksi) {
                var url = "{{ route('get_barang_transaksi', '') }}/" + id_transaksi

                try {
                    let response = await fetch(url)

                    if(response.status === 200) {
                        let result = await response.json()

                        return result.data
                    }

                } catch (error) {
                    console.log(error)
                }
            }

            async function setBarangTransaksi(id_transaksi) {
                var transaksi = await getBarangTransaksi(id_transaksi)
                var el = ""

                $('#barang_transaksi').empty()
                if(jQuery.isEmptyObject(transaksi.transaksi)) {
                    el += "<tr>"
                    el += "<td align='center' colspan='7'>Tidak ada barang dalam transaksi ini.</td>"
                    el += "</tr>"
                } else if(jQuery.isEmptyObject(transaksi.transaksi.detail)) {
                    el += "<tr>"
                    el += "<td align='center' colspan='7'>Tidak ada barang dalam transaksi ini.</td>"
                    el += "</tr>"
                } else {
                    var no = 1
                    transaksi.transaksi.detail.forEach((item) => {
                        el += "<tr id='row" + no + "'>"
                        el += "<td align='center'>" + no + "</td>"
                        el += "<td align='center'>" + item.tanggal + "</td>"
                        el += "<td>" + item.nama_barang + "</td>"
                        el += "<td>" + item.harga_modal_rp + "</td>"
                        el += "<td>" + item.harga_jual_rp + "</td>"
                        el += "<td>" + item.unit + "</td>"
                        el += "</tr>"
                        no++
                    })
                }
                
                $('#barang_transaksi').append(el)
            }

            async function getDataPembeli(id_transaksi) {
                var url = "{{ route('get_data_pembeli', '') }}/" + id_transaksi

                try {
                    let response = await fetch(url)

                    if(response.status === 200) {
                        let result = await response.json()

                        return result.data
                    }

                } catch (error) {
                    console.log(error)
                }
            }

            async function setDataPembeli(id_transaksi) {
                var pembeli = await getDataPembeli(id_transaksi)
                // console.log(pembeli.pembeli)

                if( ! jQuery.isEmptyObject(pembeli.pembeli)) {    
                    $('#nama_pembeli').text(pembeli.pembeli.nama_pembeli ?? "-")
                    $('#no_telp').text(pembeli.pembeli.no_telp ?? "-")
                    $('#alamat').text(pembeli.pembeli.alamat ?? "-")
                }
            }

            async function deleteTransaksi(id_transaksi) {
                var url = "{{ route('delete_transaksi', '') }}/" + id_transaksi

                let _data = {
                    _token: "{{ csrf_token() }}"
                }

                fetch(url, {
                    method: 'DELETE',
                    body: JSON.stringify(_data),
                    headers: {
                        "Content-Type": "application/json"
                    }
                })
                .catch(err => console.log(err))

                getTransaksiLaporan(month, year, type)
                setLaporanKeuangan(month, year, type)
            }

            getTransaksiLaporan(month, year, type)
            setLaporanKeuangan(month, year, type)

            $('#month').on('change', function() {
                month = $(this).val()
                getTransaksiLaporan(month, year, type)
                setLaporanKeuangan(month, year, type)
            })

            $('#year').on('change', function() {
                year = $(this).val()
                getTransaksiLaporan(month, year, type)
                setLaporanKeuangan(month, year, type)
            })

            $('#type').on('change', function() {
                type = $(this).val()
                getTransaksiLaporan(month, year, type)
                setLaporanKeuangan(month, year, type)
            })

            $('#table-laporan').on('click', '.delete_transaksi', async function(e) {
                // console.log($(this).data('id'))
                Swal.fire({
                    title: 'Apakah Anda yakin ingin menghapus transaksi ini?',
                    showDenyButton: true,
                    confirmButtonText: `Simpan`,
                    denyButtonText: `Batal`,
                    icon: 'question'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteTransaksi($(this).data('id'))
                        Swal.fire('Transaksi terhapus.', '', 'success')
                    }
                })
            })

            $('#table-laporan').on('click', '.show_transaksi', async function(e) {
                // console.log($(this).data('id'))
                $('#modalDetailTransaksi').modal('show')
                setBarangTransaksi($(this).data('id'))
                setDataPembeli($(this).data('id'))
            })
        })
    </script>
    </body>
</html>
