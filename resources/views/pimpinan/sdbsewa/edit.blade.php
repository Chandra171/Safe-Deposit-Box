@extends('layouts.master')

@section('title')
    Verifikasi Data Sewa SDB
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Sewa SDB
                        <a href="{{ route('sdbsewa.index') }}" class="btn btn-primary btn-sm text-white float-right">Back</a>
                    </h4>
                </div>
                <div>
                    <div class="card-body">
                        <form action="{{ url('pimpinan/sdbsewa/'. $sdb_disewa->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label>Nomor SDB</label>
                                        <select name="id_sdb" class="form-control" disabled>
                                            <option value="">{{ $sdb_disewa->id_sdb }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Nama Nasabah</label>
                                        <select name="id_nasabah" class="form-control" disabled>
                                            <option value="">{{ $sdb_disewa->id_nasabah }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Nama Nasabah</label>
                                        <select name="status" class="form-control">
                                            <option value="">{{ $sdb_disewa->status }}</option>
                                            <option value="">1</option>
                                        </select>
                                    </div>

                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary text-white float-right mb-3">Save</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
