@extends('layout.main')

@section('tittle', 'Input Pengeluaran | Berniaga Bali')
@section('container')

            <main class="p-5">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="h2">Transaksi Pengeluaran</h1>
                    <a class="btn btn-link" href="{{ route('pengeluaran_stainless') }}">Kembali ke Laporan Keuangan</a>
                </div>

                <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3" id="id_transaksi">
                        </h4>
                        <h6 class="d-flex justify-content-between align-items-center mb-3" id="nama_toko">
                        </h6>
                    </div>
                  
                    <div class="col-md-7 col-lg-8">
                        <form id="addBarangTransaksi" class="needs-validation" novalidate>
                            <div class="row g-3">
                                <div class="col-sm-12">
                                    <label for="namaBarang" class="form-label">Nama Barang</label>
                                    <input type="text" class="form-control" id="namaBarang" placeholder="" value="" required>
                                </div>

                                <div class="col-sm-4">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" placeholder="" value="{{ today()->format('Y-m-d') }}" required>
                                </div>

                                <div class="col-sm-4">
                                    <label for="hargaSatuan" class="form-label">Harga Satuan</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" class="money form-control" id="hargaSatuan" placeholder="" required>
                                    </div>
                                </div>

                                <div class="col-sm-4">
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
                                <th width="17.5%" scope="col">Harga Satuan</th>
                                <th width="7.5%" scope="col">Unit</th>
                                <th width="17.5%" scope="col">Total</th>
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
                                        <th scope="col">Sub Total</th>
                                        <th id="total_harga" width="60%" scope="col">Rp. 0</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-8 mt-3">
                        <button id="simpan" class="btn btn-success float-end">Simpan</button>
                        <button data-bs-toggle="modal" data-bs-target="#modalInputDataToko" style="margin-right: 5px" class="btn btn-warning float-end">Data Toko</button>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalInputDataToko" tabindex="-1" aria-labelledby="modalInputDataTokoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="save_data_toko">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInputDataTokoLabel">Data Toko</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="input_nama_toko" class="col-form-label">Nama Toko</label>
                            <input type="text" class="form-control input-toko" id="input_nama_toko">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="btn-save-toko">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.money').mask('000.000.000', {reverse: true})

            var isEditingMode = false
            var tanggal = $("#tanggal").val()

            async function getIdTransaksi(url) {
                var url = "{{ route('id_transaksi_pengeluaran') }}/" + tanggal
                try {
                    let response = await fetch(url)

                    if(response.status === 200) {
                        let result = await response.json()
                        return result.data.id_transaksi
                    }

                } catch (error) {
                    console.log(error)
                }
            }

            async function setIdTransaksi(date) {
                var id_transaksi = await getIdTransaksi()
                var el = `<span class='text-primary'>${id_transaksi}</span>`
                $('#id_transaksi').empty()
                $('#id_transaksi').append(el)
            }


            async function getBarangTransaksi() {
                var id_transaksi = await getIdTransaksi()
                var url = "{{ route('get_barang_transaksi_pengeluaran', '') }}/" + id_transaksi

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
                        el += "<td><input id='edit-harga-modal-row" + no + "' data-harga-modal='" + item.harga_modal + "' readonly type='text' class='money form-control-plaintext form-control-sm row" + no + "' value='" + item.harga_modal_rp + "'></td>"
                        el += "<td><input id='edit-harga-jual-row" + no + "' data-harga-jual='" + item.harga_jual + "' readonly type='text' class='money form-control-plaintext form-control-sm row" + no + "' value='" + item.harga_jual_rp + "'></td>"
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

            async function getDataToko() {
                var id_transaksi = await getIdTransaksi()
                var url = "{{ route('get_data_toko_pengeluaran', '') }}/" + id_transaksi

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

            async function setDataToko() {
                var toko = await getDataToko()
                // console.log(toko.toko)

                if( ! jQuery.isEmptyObject(toko.toko)) {
                    
                    $('#nama_toko').text(toko.toko.nama_toko)

                    $('#input_nama_toko').val(toko.toko.nama_toko)
                } else {

                    $('#nama_toko').text("")

                    $('#input_nama_toko').val("")
                }

                setListCabang()
            }

            async function clearDataToko() {

                $('#nama_toko').text("-")

                $('#input_nama_toko').val("")
            }

            async function getHargaTransaksi() {
                var id_transaksi = await getIdTransaksi()
                var url = "{{ route('get_harga_transaksi_pengeluaran', '') }}/" + id_transaksi

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
                } else {
                    $('#total_harga').text("Rp. 0")
                }
                
            }

            async function addBarangTransaksi(namaBarang, hargaSatuan, unit, tanggal) {
                var id_transaksi = await getIdTransaksi()
                var url = "{{ route('add_barang_transaksi_pengeluaran', '') }}/" + id_transaksi

                let _data = {
                    _token: "{{ csrf_token() }}",
                    id_transaksi: id_transaksi,
                    nama_barang: namaBarang,
                    harga_satuan: hargaSatuan,
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

            async function saveDataToko(namaToko) {
                var id_transaksi = await getIdTransaksi()
                var url = "{{ route('save_data_toko_pengeluaran', '') }}/" + id_transaksi

                let _data = {
                    _token: "{{ csrf_token() }}",
                    id_transaksi: id_transaksi,
                    nama_toko: namaToko,
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
                var url = "{{ route('edit_barang_transaksi_pengeluaran', '') }}/" + id_transaksi

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
                var url = "{{ route('delete_barang_transaksi_pengeluaran', '') }}/" + id_transaksi

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
                var url = "{{ route('simpan_transaksi_pengeluaran', '') }}/" + id_transaksi

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
                clearDataToko()
            }

            $('#addBarangTransaksi').on('submit', async function(e) {
                e.preventDefault();
                var namaBarang = $('#namaBarang').val()
                var hargaSatuan = $('#hargaSatuan').val()
                var unit = $('#unit').val()
                // console.log(tanggal)

                await addBarangTransaksi(namaBarang, hargaSatuab, unit, tanggal)

                clearForm()
                setBarangTransaksi(tanggal)
                setHargaTransaksi(tanggal)
            })

            function clearForm()
            {
                $('#namaBarang').val("")
                $('#hargaSatuan').val("")
                $('#unit').val(1)
            }

            $('#barang_transaksi').on('click', '.edit-barang', async function(e) {
                isEditingMode = !isEditingMode
                var detailTransaksi = $(this).data('detail-transaksi')

                if(!isEditingMode) {
                    var namaBarang = $('#edit-nama-barang-' + $(this).data('row')).val()
                    var hargaSatuan = $('#edit-harga-satuan-' + $(this).data('row')).val()
                    var unit = $('#edit-unit-' + $(this).data('row')).val()

                    await editBarangTransaksi(namaBarang, hargaSatuan, unit, detailTransaksi)
                    setBarangTransaksi()
                    setHargaTransaksi()
                }

                // alert($(this).data('row'))
                $('.' + $(this).data('row')).toggleClass('form-control-plaintext form-control')
                var isReadOnly = $('.' + $(this).data('row')).prop('readonly')
                $('.' + $(this).data('row')).prop('readonly', !isReadOnly)

                var edit_harga_satuan = $('#edit-harga-satuan-' + $(this).data('row'))
                
                var tmrp = edit_harga_satuan.val()
                var tm = edit_harga_satuan.data('harga-satuan')

                edit_harga_satuan.val(tm)
                edit_harga_satuan.data('harga-satuan', tmrp)

                $('.money').mask('000.000.000', {reverse: true});

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

            // $('#save_data_toko').on('submit', async function(e) {
            //     e.preventDefault()
            //     $('#modalInputDataToko').modal('hide')
            //     var namaToko = $('#input_nama_toko').val()
            //     var noTelp = $('#input_no_telp').val()
            //     var alamat = $('#input_alamat').val()

            //     await saveDataToko(namaToko, noTelp, alamat)
            //     setDataToko()
            // })

            $('#btn-save-toko').on('click', async function(e) {
                var namaToko = $('#input_nama_toko').val()

                await saveDataToko(namaToko)
                setDataToko()
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
            setDataToko()
            setBarangTransaksi()
            setHargaTransaksi()

            $('#tanggal').on('change', function() {
                console.log("ID Transaksi Diubah")
                tanggal = $(this).val()
                console.log(tanggal)
                setIdTransaksi(tanggal)
                setDataToko()
                setBarangTransaksi()
                setHargaTransaksi()
            })
        })
    </script>
@endsection
