@extends('layouts_pimpinan.master')

@section('title')
    Sewa SDB
@endsection

@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
    <script>
        $(function () {
            $("#sdbsewa").DataTable();
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
                    <h4>Sewa SDB
                        {{-- <a href="{{ route('sdbsewa.create') }}" class="btn btn-primary float-right btn-sm text-white">Tambah Sewa SDB</a> --}}
                    </h4>
                </div>
                <div>
                    <div class="card-body">
                        <form action="{{ url('pimpinan/sdbsewa') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor SDB</th>
                                        <th>Nama Nasabah Penyewa</th>
                                        <th>Tanggal Menyewa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                    @php($no=1)
                                    @foreach ($sdb_disewa as $sewa)
                                        @if ($sewa->status==0)
                                            <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $sewa->sdb->id }}</td>
                                                    <td>{{ $sewa->nasabah->nama_nasabah }}</td>
                                                    <td>{{ $sewa->created_at->format('d M Y') }}</td>

                                                    <td>
                                                        <form action="/pimpinan/sdbsewa/{{$sewa->id}}" method="POST">
                                                            @csrf
                                                            {{-- <a href="{{ url('cs/sdb/show', $sewa>id) }}" class="btn btn-primary">Detail</a> --}}
                                                            <a href="{{ route('sdbsewa.edit', $sewa->id) }}" class="btn btn-warning">Edit</a>
                                                            @method('DELETE')
                                                            <input type="submit" class="btn btn-danger" value="Delete">
                                                        </form>
                                                    </td>
                                            </tr>
                                        @endif
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
