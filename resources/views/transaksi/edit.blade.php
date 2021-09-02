<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.87.0">
        <title>Input Transaksi</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.min.css" integrity="sha512-FEQLazq9ecqLN5T6wWq26hCZf7kPqUbFC9vsHNbXMJtSZZWAcbJspT+/NEAQkBfFReZ8r9QlA9JHaAuo28MTJA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
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
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="h2">Transaksi Pembelian</h1>
                    <a class="btn btn-link" href="{{ route('index_laporan_keuangan') }}">Kembali ke Laporan Keuangan</a>
                </div>

                <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3" id="id_transaksi">
                        </h4>
                    </div>
                  
                    <div class="col-md-7 col-lg-8">
                        <form id="addBarangTransaksi" class="needs-validation" novalidate>
                            <div class="row g-3">
                                <div class="col-sm-8">
                                    <label for="namaBarang" class="form-label">Nama Barang</label>
                                    <input type="text" class="form-control" id="namaBarang" placeholder="" value="" required>
                                </div>

                                <div class="col-sm-4">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control-plaintext fs-6" readonly="" id="tanggal" placeholder="" value="{{ $transaksi->tanggal->format('Y-m-d') }}" required>
                                </div>

                                <div class="col-sm-5">
                                    <label for="hargaJual" class="form-label">Harga Jual</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" class="form-control" id="hargaJual" placeholder="" required>
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <label for="hargaModal" class="form-label">Harga Modal</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" class="form-control" id="hargaModal" placeholder="" required>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <label for="unit" class="form-label">Unit</label>
                                    <div class="input-group has-validation">
                                        <input type="number" class="form-control" id="unit" placeholder="" required min="1" value="1">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <button id="tambah" class="btn btn-primary float-end" type="submit">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="table-responsive mt-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="5%" scope="col">#</th>
                                <th width="10%" scope="col">Date</th>
                                <th width="30%" scope="col">Nama Barang</th>
                                <th width="17.5%" scope="col">Harga Modal</th>
                                <th width="17.5%" scope="col">Harga Jual</th>
                                <th width="7.5%" scope="col">Unit</th>
                                <th width="12.5%" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="barang_transaksi">
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Total Harga</th>
                                        <th id="total_harga" width="60%" scope="col">Rp. 0</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Total Modal</td>
                                    <td id="total_modal">Rp. 0</td>
                                </tr>
                                <tr>
                                    <td>Keuntungan Bersih</td>
                                    <td id="keuntungan_bersih">Rp. 0</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama Pembeli</th>
                                        <th id="nama_pembeli" width="60%" scope="col">-</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>No Telp</td>
                                    <td id="no_telp">-</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td id="alamat">-</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <!-- <button id="simpan" class="btn btn-success float-end">Simpan</button> -->
                        <button data-bs-toggle="modal" data-bs-target="#modalInputDataPembeli" style="margin-right: 5px" class="btn btn-warning float-end">Data Pembeli</button>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalInputDataPembeli" tabindex="-1" aria-labelledby="modalInputDataPembeliLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="save_data_pembeli">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInputDataPembeliLabel">Data Pembeli</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="input_nama_pembeli" class="col-form-label">Nama</label>
                            <input type="text" class="form-control" id="input_nama_pembeli">
                        </div>
                        <div class="mb-3">
                            <label for="input_no_telp" class="col-form-label">No Telp</label>
                            <input type="text" class="form-control" id="input_no_telp">
                        </div>
                        <div class="mb-3">
                            <label for="input_alamat" class="col-form-label">Alamat</label>
                            <textarea class="form-control" id="input_alamat"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var isEditingMode = false;

            async function getIdTransaksi() {
                return "{{ $transaksi->id }}"
            }

            async function setIdTransaksi(date) {
                var id_transaksi = await getIdTransaksi()
                var el = `<span class='text-primary'>${id_transaksi}</span>`
                $('#id_transaksi').empty()
                $('#id_transaksi').append(el)
            }


            async function getBarangTransaksi() {
                var id_transaksi = await getIdTransaksi()
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

            async function setBarangTransaksi() {
                var transaksi = await getBarangTransaksi()
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
                        el += "<td><input id='edit-nama-barang-row" + no + "' readonly type='text' class='form-control-plaintext form-control-sm row" + no + "' value='" + item.nama_barang + "'></td>"
                        el += "<td><input id='edit-harga-modal-row" + no + "' data-harga-modal='" + item.harga_modal + "' readonly type='text' class='form-control-plaintext form-control-sm row" + no + "' value='" + item.harga_modal_rp + "'></td>"
                        el += "<td><input id='edit-harga-jual-row" + no + "' data-harga-jual='" + item.harga_jual + "' readonly type='text' class='form-control-plaintext form-control-sm row" + no + "' value='" + item.harga_jual_rp + "'></td>"
                        el += "<td><input id='edit-unit-row" + no + "' readonly type='number' class='form-control-plaintext form-control-sm row" + no + "' value='" + item.unit + "'></td>"
                        el += "<td>"
                        el += "<button data-detail-transaksi='" + item.id_detail_transaksi + "' data-row='row" + no + "' class='btn btn-sm btn-warning edit-barang'>Edit</button> <button data-detail-transaksi='" + item.id_detail_transaksi + "' data-row='row" + no + "' class='btn btn-sm btn-danger hapus-barang'>Hapus</button>"
                        el += "</td>"
                        el += "</tr>"
                        no++
                    })
                }
                
                $('#barang_transaksi').append(el)
            }

            async function getDataPembeli() {
                var id_transaksi = await getIdTransaksi()
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

            async function setDataPembeli() {
                var pembeli = await getDataPembeli()
                // console.log(pembeli.pembeli)

                if( ! jQuery.isEmptyObject(pembeli.pembeli)) {    
                    $('#nama_pembeli').text(pembeli.pembeli.nama_pembeli)
                    $('#no_telp').text(pembeli.pembeli.no_telp)
                    $('#alamat').text(pembeli.pembeli.alamat)

                    $('#input_nama_pembeli').val(pembeli.pembeli.nama_pembeli)
                    $('#input_no_telp').val(pembeli.pembeli.no_telp)
                    $('#input_alamat').val(pembeli.pembeli.alamat)
                } else {
                    $('#nama_pembeli').text("")
                    $('#no_telp').text("")
                    $('#alamat').text("")

                    $('#input_nama_pembeli').val("")
                    $('#input_no_telp').val("")
                    $('#input_alamat').val("")
                }
            }

            async function clearDataPembeli() {
                $('#nama_pembeli').text("-")
                $('#no_telp').text("-")
                $('#alamat').text("-")

                $('#input_nama_pembeli').val("")
                $('#input_no_telp').val("")
                $('#input_alamat').val("")
            }

            async function getHargaTransaksi() {
                var id_transaksi = await getIdTransaksi()
                var url = "{{ route('get_harga_transaksi', '') }}/" + id_transaksi

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

            async function setHargaTransaksi() {
                var transaksi = await getHargaTransaksi()
                var el = ""

                if(!jQuery.isEmptyObject(transaksi)) {
                    $('#total_harga').text(transaksi.total_harga_rp)
                    $('#total_modal').text(transaksi.total_modal_rp)
                    $('#keuntungan_bersih').text(transaksi.keuntungan_bersih_rp)
                } else {
                    $('#total_harga').text("Rp. 0")
                    $('#total_modal').text("Rp. 0")
                    $('#keuntungan_bersih').text("Rp. 0")
                }
                
            }

            async function addBarangTransaksi(namaBarang, hargaJual, hargaModal, unit, tanggal) {
                var id_transaksi = await getIdTransaksi()
                var url = "{{ route('add_barang_transaksi', '') }}/" + id_transaksi

                let _data = {
                    _token: "{{ csrf_token() }}",
                    id_transaksi: id_transaksi,
                    nama_barang: namaBarang,
                    harga_jual: hargaJual,
                    harga_modal: hargaModal,
                    unit: unit,
                    tanggal: tanggal
                }

                fetch(url, {
                    method: 'POST',
                    body: JSON.stringify(_data),
                    headers: {
                        "Content-Type": "application/json"
                    }
                })
                .catch(err => console.log(err))
            }

            async function saveDataPembeli(namaPembeli, noTelp, alamat) {
                var id_transaksi = await getIdTransaksi()
                var url = "{{ route('save_data_pembeli', '') }}/" + id_transaksi

                let _data = {
                    _token: "{{ csrf_token() }}",
                    id_transaksi: id_transaksi,
                    nama_pembeli: namaPembeli,
                    no_telp: noTelp,
                    alamat: alamat,
                    tanggal: tanggal
                }

                fetch(url, {
                    method: 'POST',
                    body: JSON.stringify(_data),
                    headers: {
                        "Content-Type": "application/json"
                    }
                })
                .catch(err => console.log(err))
            }

            async function editBarangTransaksi(namaBarang, hargaJual, hargaModal, unit, detailTransaksi) {
                var id_transaksi = await getIdTransaksi()
                var url = "{{ route('edit_barang_transaksi', '') }}/" + id_transaksi

                let _data = {
                    _token: "{{ csrf_token() }}",
                    id_transaksi: id_transaksi,
                    nama_barang: namaBarang,
                    harga_jual: hargaJual,
                    harga_modal: hargaModal,
                    unit: unit,
                    detail_transaksi: detailTransaksi
                }

                fetch(url, {
                    method: 'PUT',
                    body: JSON.stringify(_data),
                    headers: {
                        "Content-Type": "application/json"
                    }
                })
                .catch(err => console.log(err))
            }

            async function deleteBarangTransaksi(detailTransaksi) {
                var id_transaksi = await getIdTransaksi()
                var url = "{{ route('delete_barang_transaksi', '') }}/" + id_transaksi

                let _data = {
                    _token: "{{ csrf_token() }}",
                    detail_transaksi: detailTransaksi
                }

                fetch(url, {
                    method: 'DELETE',
                    body: JSON.stringify(_data),
                    headers: {
                        "Content-Type": "application/json"
                    }
                })
                .catch(err => console.log(err))
            }

            async function simpanTransaksi() {
                var id_transaksi = await getIdTransaksi()
                var url = "{{ route('simpan_transaksi', '') }}/" + id_transaksi

                let _data = {
                    _token: "{{ csrf_token() }}"
                }

                fetch(url, {
                    method: 'PUT',
                    body: JSON.stringify(_data),
                    headers: {
                        "Content-Type": "application/json"
                    }
                })
                .catch(err => console.log(err))

                setIdTransaksi(tanggal)
                setBarangTransaksi()
                setHargaTransaksi()
                setDataPembeli()
            }

            $('#addBarangTransaksi').on('submit', async function(e) {
                e.preventDefault();
                var namaBarang = $('#namaBarang').val()
                var hargaJual = $('#hargaJual').val()
                var hargaModal = $('#hargaModal').val()
                var unit = $('#unit').val()
                // console.log(tanggal)

                await addBarangTransaksi(namaBarang, hargaJual, hargaModal, unit, tanggal)

                clearForm()
                setBarangTransaksi(tanggal)
                setHargaTransaksi(tanggal)
            })

            function clearForm()
            {
                $('#namaBarang').val("")
                $('#hargaJual').val("")
                $('#hargaModal').val("")
                $('#unit').val(1)
            }

            $('#barang_transaksi').on('click', '.edit-barang', async function(e) {
                isEditingMode = !isEditingMode
                var detailTransaksi = $(this).data('detail-transaksi')

                if(!isEditingMode) {
                    var namaBarang = $('#edit-nama-barang-' + $(this).data('row')).val()
                    var hargaJual = $('#edit-harga-jual-' + $(this).data('row')).val()
                    var hargaModal = $('#edit-harga-modal-' + $(this).data('row')).val()
                    var unit = $('#edit-unit-' + $(this).data('row')).val()

                    await editBarangTransaksi(namaBarang, hargaJual, hargaModal, unit, detailTransaksi)
                    setBarangTransaksi()
                    setHargaTransaksi()
                }

                // alert($(this).data('row'))
                $('.' + $(this).data('row')).toggleClass('form-control-plaintext form-control')
                var isReadOnly = $('.' + $(this).data('row')).prop('readonly')
                $('.' + $(this).data('row')).prop('readonly', !isReadOnly)

                var edit_harga_modal = $('#edit-harga-modal-' + $(this).data('row'))
                var edit_harga_jual = $('#edit-harga-jual-' + $(this).data('row'))
                
                var tmrp = edit_harga_modal.val()
                var tm = edit_harga_modal.data('harga-modal')

                var tjrp = edit_harga_jual.val()
                var tj = edit_harga_jual.data('harga-jual')

                edit_harga_modal.val(tm)
                edit_harga_modal.data('harga-modal', tmrp)

                edit_harga_jual.val(tj)
                edit_harga_jual.data('harga-jual', tjrp)
                // console.log(tmrp)
            })

            $('#barang_transaksi').on('click', '.hapus-barang', async function(e) {
                var detailTransaksi = $(this).data('detail-transaksi')
                // alert(detailTransaksi)
                $('#' + $(this).data('row')).remove()
                deleteBarangTransaksi(detailTransaksi)
                setBarangTransaksi()
                setHargaTransaksi()
            })

            $('#save_data_pembeli').on('submit', async function(e) {
                e.preventDefault()
                $('#modalInputDataPembeli').modal('hide')
                var namaPembeli = $('#input_nama_pembeli').val()
                var noTelp = $('#input_no_telp').val()
                var alamat = $('#input_alamat').val()

                await saveDataPembeli(namaPembeli, noTelp, alamat)
                setDataPembeli()
            })

            $('#simpan').on('click', async function(e) {
                Swal.fire({
                    title: 'Apakah Anda yakin ingin menyimpan transaksi ini?',
                    showDenyButton: true,
                    confirmButtonText: `Simpan`,
                    denyButtonText: `Batal`,
                    icon: 'question'
                }).then((result) => {
                    if (result.isConfirmed) {
                        simpanTransaksi()
                        Swal.fire('Transaksi tersimpan.', '', 'success')
                    }
                })
            })

            setIdTransaksi()
            setBarangTransaksi()
            setHargaTransaksi()
            setDataPembeli()
        })
    </script>
    </body>
</html>
