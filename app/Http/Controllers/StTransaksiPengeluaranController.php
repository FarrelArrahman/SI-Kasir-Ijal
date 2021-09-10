<?php

namespace App\Http\Controllers;

use App\Models\st_Transaksi_pengeluaran;
use Illuminate\Http\Request;

class StTransaksiPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('st_transaksi.pengeluaran');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return json_encode($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\st_Transaksi_pengeluaran  $st_Transaksi_pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(st_Transaksi_pengeluaran $st_Transaksi_pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\st_Transaksi_pengeluaran  $st_Transaksi_pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit(st_Transaksi_pengeluaran $st_Transaksi_pengeluaran)
    {
        return view('st_transaksi.edit_pengeluaran', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\st_Transaksi_pengeluaran  $st_Transaksi_pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, st_Transaksi_pengeluaran $st_Transaksi_pengeluaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\st_Transaksi_pengeluaran  $st_Transaksi_pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(st_Transaksi_pengeluaran $st_Transaksi_pengeluaran)
    {
        //
    }
}
