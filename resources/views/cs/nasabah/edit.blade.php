@extends('layouts.master')

@section('title')
    Ubah Data Nasabah
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ubah Data Nasabah
                        <a href="{{ route('nasabah.index') }}" class="btn btn-primary btn-sm text-white float-right">Back</a>
                    </h4>
                </div>
                <div>
                    <div class="card-body">
                        <form action="{{ url('cs/nasabah/'.$nasabah->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label>Nomor Rekening</label>
                                        <input type="text" name="no_rek" class="form-control" value="{{ $nasabah->no_rek }}" disabled/>
                                        @error('no_rek')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Nama Nasabah</label>
                                        <input type="text" name="nama_nasabah" class="form-control" value="{{ $nasabah->nama_nasabah }}"/>
                                        @error('nama_nasabah')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Nomor HP</label>
                                        <input type="text" name="phone" class="form-control" value="{{ $nasabah->phone }}"/>
                                        @error('phone')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control" value="{{ $nasabah->alamat }}" rows="3"></textarea>
                                        @error('alamat')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Foto KTP</label>
                                        <input type="file" name="ktp" class="form-control" value="{{ $nasabah->ktp }}"/>
                                        <img src="{{ asset('/images/ktp/'.$nasabah->ktp) }}" width="60px" height="60px"/>
                                        @error('ktp')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Foto Diri</label>
                                        <input type="file" name="foto" class="form-control"value="{{ $nasabah->foto}}"/>
                                        <img src="{{ asset('/images/foto/'.$nasabah->foto) }}" width="60px" height="60px"/>
                                        @error('foto')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-primary text-white float-end">Update</button>
                                    </div>

                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
