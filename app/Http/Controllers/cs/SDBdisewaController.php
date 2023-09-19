<?php

namespace App\Http\Controllers\cs;

use App\Http\Controllers\Controller;
use App\Models\Nasabah;
use App\Models\SDB;
use App\Models\SDBdisewa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SDBdisewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sdb = SDB::all();
        $nasabah = Nasabah::all();
        $sdb_disewa = SDBdisewa::all();

        return view('cs.sdbsewsa.index', compact('sdb', 'nasabah', 'sdb_disewa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sdb_disewa = SDBdisewa::all();
        $sdb = SDB::all();
        $nasabah = Nasabah::all();
        return view('cs.sdbsewsa.create', compact('sdb_disewa', 'sdb', 'nasabah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sdb_disewa = new SDBdisewa;

        $sdb_disewa->id_sdb = $request->id_sdb;
        $sdb_disewa->id_nasabah = $request->id_nasabah;
        $sdb_disewa->status = 0;

        $sdb_disewa->save();
        Alert::success('Berhasil', 'Data Safe Deposit Box Yang Disewa berhasil Disimpan, Silakan Verifikasi Kepada Pimpinan');
        return redirect('cs/sdbsewsa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sdb_disewa = SDBdisewa::find($id);
        $sdb = SDB::find($id);
        $nasabah = Nasabah::find($id);
        return view('cs.sdbsewsa.show', compact('sdb_disewa', 'sdb', 'nasabah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sdb_disewa = SDBdisewa::find($id);
        $sdb = SDB::all();
        $nasabah = Nasabah::all();
        return view('cs.sdbsewsa.edit', compact('sdb_disewa', 'sdb', 'nasabah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sdb_disewa = SDBdisewa::find($id);

        $sdb_disewa->id_nasabah;
        $sdb_disewa->id_sdb = $request->id_sdb;

        $sdb_disewa->update();
        Alert::success('Berhasil', 'Data Safe Deposit Box Yang Disewa berhasil Diedit');
        return redirect('cs/sdbsewsa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sdb_disewa = SDBdisewa::find($id);
        $sdb_disewa->delete();

        Alert::success('Berhasil', 'Data Safe Deposit Box Yang Disewa Berhasil Dihapus');
        return redirect('cs/sdbsewsa');
    }
}
