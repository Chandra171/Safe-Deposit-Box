@extends('layouts.master')

@section('title')
    Tambah Data Sewa SDB
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Sewa SDB
                        <a href="{{ route('sdbsewsa.index') }}" class="btn btn-primary btn-sm text-white float-right">Back</a>
                    </h4>
                </div>
                <div>
                    <div class="card-body">
                        <form action="{{ url('cs/sdbsewsa') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label>Nomor SDB</label>
                                        <select name="id_sdb" class="form-control" required>
                                            <option value="">--Pilih SDB--</option>
                                            @forelse ($sdb as $item)
                                                @if ($item->status==0)
                                                    <option value="{{ $item->id }}">{{ $item->id }}</option>
                                                @endif
                                            @empty
                                                <option value="">--Tidak ada SDB--</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Nama Nasabah</label>
                                        <select name="id_nasabah" class="form-control" required>
                                            <option value="">--Pilih Nasabah--</option>
                                            @forelse ($nasabah as $nama)
                                                {{-- @if ($nama->status==1) --}}
                                                    <option value="{{ $nama->id }}">{{ $nama->nama_nasabah }}</option>
                                                {{-- @endif --}}
                                            @empty
                                                <option value="">--Tidak ada Nasabah--</option>
                                            @endforelse
                                        </select>

                                        <div>
                                            <button type="submit" class="btn btn-primary text-white float-right mt-3">Save</button>
                                        </div>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
