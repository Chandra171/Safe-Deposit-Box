<?php

namespace App\Http\Controllers\cs;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use App\Models\Nasabah;
use App\Models\SDB;
use App\Models\SDBdisewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kunjungan = Kunjungan::all();
        $sdb = SDB::all();
        $nasabah = Nasabah::all();
        return view('cs.kunjungan.index', compact('kunjungan', 'sdb', 'nasabah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kunjungan = Kunjungan::all();
        $sdb = SDB::all();
        $nasabah = Nasabah::all();
        $sdb_disewa = SDBdisewa::all();
        return view('cs.kunjungan.create', compact('kunjungan', 'sdb', 'nasabah', 'sdb_disewa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $kunjungan = new Kunjungan;

        $kunjungan->id_sdb = $request->id_sdb;
        $kunjungan->id_user = 1;
        $kunjungan->id_nasabah = $request->id_nasabah;
        $kunjungan->jam_masuk = $request->jam_masuk;
        $kunjungan->jam_keluar = $request->jam_keluar;

        $kunjungan->save();
        Alert::success('Berhasil', 'Data Kunjungan berhasil Disimpan');
        return redirect('cs/kunjungan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kunjungan = Kunjungan::all();
        $sdb = SDB::find($id);
        $nasabah = Nasabah::find($id);
        return view('cs.kunjungan.show', compact('kunjungan', 'sdb', 'nasabah'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kunjungan = Kunjungan::find($id);
        $sdb = SDB::all();
        $nasabah = Nasabah::all();
        return view('cs.kunjungan.edit', compact('kunjungan', 'sdb', 'nasabah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $kunjungan = Kunjungan::find($id);
        // $kunjungan->id_sdb = $request->id_sdb;
        $kunjungan->id_sdb;
        $kunjungan->id_user = 1;
        // $kunjungan->id_nasabah = $request->id_nasabah;
        $kunjungan->id_nasabah;
        $kunjungan->jam_masuk = $request->jam_masuk;
        $kunjungan->jam_keluar = $request->jam_keluar;

        $kunjungan->update();
        Alert::success('Berhasil', 'Data Kunjungan berhasil Diubah');
        return redirect('cs/kunjungan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kunjungan = Kunjungan::find($id);
        $kunjungan->delete();

        Alert::success('Berhasil', 'Data Kunjungan Safe Deposit Box Berhasil Dihapus');
        return redirect('cs/kunjungan');
    }
}
