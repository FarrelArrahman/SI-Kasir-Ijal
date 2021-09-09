@extends('layout.main')

@section('tittle', 'Portofolio | Berniaga Bali')
@section('container')
            <main class="p-4">
                <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    
                </div> -->

                <div class="d-flex row pt-3 pb-2 mb-3">
                        <div class="col-md-6">
                            <h1 class="h2">Laporan Keuangan</h1>
                        </div>
                        <div class="col-md-6">
                            <form class="row gy-2 gx-3 align-items-center">
                                <div class="col-sm-4">
                                    <label class="visually-hidden" for="month">Cabang</label>
                                    <select class="form-select" id="branch">
                                        @foreach($cabang as $value)
                                        <option value="{{ $value->id }}">{{ $value->nama_cabang }}</option>
                                        @endforeach
                                    </select>
                                </div>
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
                            </form>
                        </div>
                    </div>

                <div class="row" id="pemasukan">
                    <h1 align="center" class="h3" id="title-musi">Laporan Pemasukan Musi</h1>
                    <h1 align="center" class="h3" id="title-badung">Laporan Pemasukan Badung</h1>
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

                    <div class="col-md-6" id="pembagian-badung">
                        <div class="table-responsive mt-3">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Pembagian 1 50%</td>
                                    <td id="pembagian1" width="30%" scope="col">Rp. 0</td>
                                </tr>
                                <tr>
                                    <td>Pembagian 2 50%</td>
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



                <div class="row mt-3" id="table_pemasukan">
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

    <script type="text/javascript">
        $('#title-badung').hide()
        $('#pembagian-badung').hide()
        
        $(document).ready(function() {
            var branch = $('#branch').val()
            var month = $('#month').val()
            var year = $('#year').val()
            var table = $("#table-laporan").DataTable()

            async function getTransaksiLaporan(branch, month, year, type) {
                const param = {
                    branch: branch,
                    month: month,
                    year: year
                }

                var url = `{{ route('transaksi_laporan_keuangan') }}?month=${encodeURIComponent(param.month)}&year=${encodeURIComponent(param.year)}&branch=${encodeURIComponent(param.branch)}`

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

            async function getLaporanKeuangan(branch, month, year) {
                const param = {
                    branch: branch,
                    month: month,
                    year: year
                }

                var url = `{{ route('laporan_keuangan') }}?month=${encodeURIComponent(param.month)}&year=${encodeURIComponent(param.year)}&branch=${encodeURIComponent(param.branch)}`

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

            async function setLaporanKeuangan(branch, month, year) {
                var laporan = await getLaporanKeuangan(branch, month, year)
                
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

                getTransaksiLaporan(branch, month, year)
                setLaporanKeuangan(branch, month, year)
            }

            getTransaksiLaporan(branch, month, year)
            setLaporanKeuangan(branch, month, year)

            $('#branch').on('change', function() {
                branch = $(this).val()
                if(branch=="2"){             
                    $('#title-badung').show()
                    $('#title-musi').hide()
                    $('#pembagian-badung').show()
                }else{                    
                    $('#title-badung').hide()
                    $('#title-musi').show()
                    $('#pembagian-badung').hide()
                }
                getTransaksiLaporan(branch, month, year)
                setLaporanKeuangan(branch, month, year)

            })

            $('#month').on('change', function() {
                month = $(this).val()
                getTransaksiLaporan(branch, month, year)
                setLaporanKeuangan(branch, month, year)
            })

            $('#year').on('change', function() {
                year = $(this).val()
                getTransaksiLaporan(branch, month, year)
                setLaporanKeuangan(branch, month, year)
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
@endsection
