@extends('layouts.master')

@section('title')
    Ubah Data Kunjungan

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ubah Data Kunjungan
                        <a href="{{ route('kunjungan.index') }}" class="btn btn-primary btn-sm text-white float-right">Back</a>
                    </h4>
                </div>
                <div>
                    <div class="card-body">
                        <form action="{{ url('cs/kunjungan/'.$kunjungan->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label>Nomor SDB</label>
                                    <select name="id_sdb" class="form-control" disabled>
                                        <option value="">{{$kunjungan->sdb->no_sdb}}</option>
                                        @forelse ($sdb as $item)
                                            @if ($item->status==1)
                                                <option value="{{ $item->id }}">{{ $item->no_sdb }}</option>
                                            @endif
                                        @empty
                                            <option value="">--Tidak ada SDB--</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Nama Nasabah</label>
                                    <select name="id_nasabah" class="form-control" disabled>
                                        <option value="">{{$kunjungan->nasabah->nama_nasabah}}</option>
                                        @forelse ($nasabah as $nama)
                                            @if ($nama->status==1)
                                                <option value="{{ $nama->id }}">{{ $nama->nama_nasabah }}</option>
                                            @endif
                                        @empty
                                            <option value="">--Tidak ada Nasabah--</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Jam Masuk</label>
                                    <input type="time" name="jam_masuk" class="form-control" value="{{ $kunjungan->jam_masuk }}"/>
                                    @error('jam_masuk')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Jam Keluar</label>
                                    <input type="time" name="jam_keluar" class="form-control" value="{{ $kunjungan->jam_keluar }}"/>
                                    @error('jam_keluar')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
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
