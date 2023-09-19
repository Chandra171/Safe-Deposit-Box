<?php

namespace App\Http\Controllers\pimpinan;

use App\Http\Controllers\Controller;
use App\Models\SDBdisewa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PimpinanSDBController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sdb_disewa = SDBdisewa::all();
        return view('pimpinan.sdbsewa.index', compact('sdb_disewa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sdb_disewa = SDBdisewa::find($id);
        return view('pimpinan.sdbsewa.edit', compact('sdb_disewa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sdb_disewa = SDBdisewa::find($id);

        $sdb_disewa->status = 1;

        $sdb_disewa->update();
        Alert::success('Berhasil', 'Data Safe Deposit Box Yang Disewa berhasil Disimpan');
        return redirect('pimpinan/sdbsewa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
