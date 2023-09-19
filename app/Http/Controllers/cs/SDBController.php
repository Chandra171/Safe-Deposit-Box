<?php

namespace App\Http\Controllers\cs;

use App\Http\Controllers\Controller;
use App\Models\SDB;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SDBController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sdb = SDB::orderBy('no_sdb', 'ASC')->get();
        return view('cs.sdb.index', compact('sdb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cs.sdb.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'no_sdb' => 'required|integer',
            'ukuran' => 'required|string',
            'no_kunci' => 'required|integer',
        ]);

        if($validator->fails()){
            Alert::error('Gagal Menambah Data Safe Deposit Box');
        }

        $validator->validate();
        $sdb = new SDB;

        $sdb->no_sdb = $request->no_sdb;
        $sdb->ukuran = $request->ukuran;
        $sdb->no_kunci = $request->no_kunci;

        $sdb->save();
        Alert::success('Berhasil', 'Data Safe Deposit Box berhasil Disimpan');
        return redirect('cs/sdb');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sdb = SDB::find($id);
        return view('cs.sdb.show', compact('sdb'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sdb = SDB::find($id);
        return view('cs.sdb.edit', compact('sdb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'ukuran' => 'required|string',
            'no_kunci' => 'required|integer',
        ]);

        if($validator->fails()){
            Alert::error('Gagal Menambah Data Safe Deposit Box');
        }

        $sdb = SDB::find($id);
        $sdb->ukuran = $request->ukuran;
        $sdb->no_kunci = $request->no_kunci;

        $sdb->update();
        Alert::success('Berhasil', 'Data Safe Deposit Box berhasil Diubah');
        return redirect('cs/sdb');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sdb = SDB::find($id);
        $sdb->delete();

        Alert::success('Berhasil', 'Data Safe Deposit Box Berhasil Dihapus');
        return redirect('cs/sdb');
    }
}
