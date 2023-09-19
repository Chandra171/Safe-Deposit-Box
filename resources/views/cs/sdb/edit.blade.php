@extends('layouts.master')

@section('title')
    Ubah Data Safe Deposit Box
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ubah Data Safe Deposit Box
                        <a href="{{ route('sdb.index') }}" class="btn btn-primary btn-sm text-white float-right">Back</a>
                    </h4>
                </div>
                <div>
                    <div class="card-body">
                        <form action="{{ url('cs/sdb/'.$sdb->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Nomor Safe Deposit Box</label>
                                        <input type="text" name="no_sdb" class="form-control" value="{{ $sdb->no_sdb }}" disabled/>
                                        @error('no_sdb')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Ukuran</label>
                                        <input type="text" name="ukuran" class="form-control" value="{{ $sdb->ukuran }}"/>
                                        @error('ukuran')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Nomor Kunci</label>
                                        <input type="text" name="no_kunci" class="form-control" value="{{ $sdb->no_kunci }}"/>
                                        @error('no_kunci')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary text-white float-right mb-3">Update</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
