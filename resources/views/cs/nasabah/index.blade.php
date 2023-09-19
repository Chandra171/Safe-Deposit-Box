@extends('layouts.master')

@section('title')
    Nasabah
@endsection

@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
    <script>
        $(function () {
            $("#nasabah").DataTable();
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
                    <h4>Nasabah
                        <a href="{{ route('nasabah.create') }}" class="btn btn-primary float-right btn-sm text-white">Tambah Nasabah</a>
                    </h4>
                </div>
                <div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Rekening</th>
                                        <th>Nama Nasabah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                    @php($no=1)
                                    @foreach ($nasabah as $nama)
                                        <tr>
                                            {{-- @if ($nama->status==1) --}}
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $nama->no_rek }}</td>
                                                <td>{{ $nama->nama_nasabah }}</td>
                                                <td>
                                                    <form action="/cs/nasabah/{{$nama->id}}" method="POST">
                                                        @csrf
                                                        {{-- <a href="{{ url('cs/nasabah/show', $nama->id) }}" class="btn btn-primary">Detail</a> --}}
                                                        <a href="{{ route('nasabah.edit', $nama->id) }}" class="btn btn-warning">Edit</a>
                                                        @method('DELETE')
                                                        <input type="submit" class="btn btn-danger" value="Delete">
                                                    </form>
                                                </td>
                                            {{-- @endif --}}
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
