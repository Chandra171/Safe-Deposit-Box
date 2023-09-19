@extends('layouts.master')

@section('title')
    Tambah Data Nasabah
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Data Nasabah
                        <a href="{{ route('nasabah.index') }}" class="btn btn-primary btn-sm text-white float-right">Back</a>
                    </h4>
                </div>
                <div>
                    <div class="card-body">
                        <form action="{{ url('cs/nasabah') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label>Nomor Rekening</label>
                                        <input type="text" name="no_rek" class="form-control"/>
                                        @error('no_rek')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Nama Nasabah</label>
                                        <input type="text" name="nama_nasabah" class="form-control"/>
                                        @error('nama_nasabah')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Nomor HP</label>
                                        <input type="text" name="phone" class="form-control"/>
                                        @error('phone')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control" rows="3"></textarea>
                                        @error('alamat')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Foto KTP</label>
                                        <input type="file" name="ktp" class="form-control"/>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Foto Diri</label>
                                        <input type="file" name="foto" class="form-control"/>
                                    </div>

                                    {{-- <div class="col-md-12">
                                        <br><h4>SEO Tags</h4>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control"/>
                                        @error('meta_title')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Meta Keyword</label>
                                        <input type="text" name="meta_keyword" class="form-control"/>
                                        @error('meta_keyword')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Meta Description</label>
                                        <textarea name="meta_description" class="form-control" rows="3"></textarea>
                                        @error('meta_description')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div> --}}

                                    <div>
                                        <button type="submit" class="btn btn-primary text-white float-end">Save</button>
                                    </div>

                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
