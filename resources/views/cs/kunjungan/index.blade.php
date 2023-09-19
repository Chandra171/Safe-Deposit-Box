@extends('layouts.master')

@section('title')
    Kunjungan
@endsection

@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
    <script>
        $(function () {
            $("#kunjungan").DataTable();
        });
    </script>
@endpush

@push('headers')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
                <div class='alert alert-success'>{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Kunjungan
                        <a href="{{ route('kunjungan.create') }}" class="btn btn-primary float-right btn-sm text-white">Tambah Kunjungan</a>
                    </h4>
                </div>
                <div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor SDB</th>
                                        <th>Nama Nasabah Pengujung</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                    @php($no=1)
                                    @foreach ($kunjungan as $kunjung)
                                        <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $kunjung->sdb->no_sdb }}</td>
                                                <td>{{ $kunjung->nasabah->nama_nasabah }}</td>
                                                <td>{{ $kunjung->jam_masuk }}</td>
                                                <td>{{ $kunjung->jam_keluar }}</td>
                                                <td>{{ $kunjung->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <form action="/cs/kunjungan/{{$kunjung->id}}" method="POST">
                                                        @csrf
                                                        {{-- <a href="{{ url('cs/kunjungan/show', $kunjung->id) }}" class="btn btn-primary">Detail</a> --}}
                                                        <a href="{{ route('kunjungan.edit', $kunjung->id) }}" class="btn btn-warning">Edit</a>
                                                        @method('DELETE')
                                                        <input type="submit" class="btn btn-danger" value="Delete">
                                                    </form>
                                                </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
