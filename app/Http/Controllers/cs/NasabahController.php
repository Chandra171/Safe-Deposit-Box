<?php

namespace App\Http\Controllers\cs;

use App\Http\Controllers\Controller;
use App\Models\Nasabah;
use File;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nasabah = Nasabah::all();
        return view('cs.nasabah.index', compact('nasabah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cs.nasabah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'no_rek' => 'required|string',
            'nama_nasabah' => 'required|string',
            'phone' => 'nullable|string',
            'alamat' => 'nullable|string',
            'ktp' => 'required|mimes:png,jpg,jpeg',
            'foto' => 'required|mimes:png,jpg,jpeg'
        ]);

        if($validator->fails()){
            Alert::error('Gagal menambah data nasabah');
        }

        // $validator->validate();
        // Nasabah::create($request->all());
        // return redirect()->back()->with('success', 'Berhasil ditambahkan');

        $validator->validate();
        $foto_ktp = time().'.'.$request->ktp->extension();
        $request->ktp->move(public_path('images/ktp'), $foto_ktp);

        $foto_diri = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('images/foto'), $foto_diri);

        $nasabah = new Nasabah;

        $nasabah->no_rek = $request->no_rek;
        $nasabah->nama_nasabah = $request->nama_nasabah;
        $nasabah->phone = $request->phone;
        $nasabah->alamat = $request->alamat;
        $nasabah->ktp = $foto_ktp;
        $nasabah->foto = $foto_diri;

        $nasabah->save();
        Alert::success('Berhasil', 'Data Nasabah Berhasil disimpan');
        return redirect('cs/nasabah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $nasabah = Nasabah::find($id);
        return view('cs.nasabah.show', compact('nasabah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nasabah = Nasabah::find($id);
        return view('cs.nasabah.edit', compact('nasabah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'nama_nasabah' => 'required|string',
            'phone' => 'nullable|string',
            'alamat' => 'nullable|string',
            'ktp' => 'required|mimes:png,jpg,jpeg',
            'foto' => 'required|mimes:png,jpg,jpeg'
        ]);

        if($validator->fails()){
            Alert::error('Gagal menambah data nasabah');
        }

        $nasabah = Nasabah::find($id);
        $nasabah->nama_nasabah = $request->nama_nasabah;
        $nasabah->phone = $request->phone;
        $nasabah->alamat = $request->alamat;
        $foto_ktp = $nasabah->ktp;
        $foto_diri = $nasabah->foto;

        if($request->has('ktp')){
            $path = "images/ktp/";
            File::delete($path . $nasabah->ktp);

            $foto_ktp = time().'.'.$request->ktp->extension();
            $request->ktp->move(public_path('images'), $foto_ktp);
            $nasabah->ktp = $foto_ktp;
            $nasabah->save();
        }

        if($request->has('foto')){
            $path = "images/foto/";
            File::delete($path . $nasabah->foto);

            $foto_diri = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('images'), $foto_diri);
            $nasabah->foto = $foto_diri;
            $nasabah->save();
        }

        $nasabah->update();

        Alert::success('Berhasil', 'Data Nasabah Berhasil diedit');
        return redirect('cs/nasabah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nasabah = Nasabah::find($id);
        $path_ktp = 'images/ktp/';
        file::delete($path_ktp, $nasabah->ktp);
        $path_foto = 'images/foto/';
        file::delete($path_foto, $nasabah->foto);
        $nasabah->delete();

        Alert::success('Berhasil', 'Data Nasabah Berhasil dihapus');
        return redirect('cs/nasabah');
    }
}
