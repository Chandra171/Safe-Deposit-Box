@extends('layouts.master')

@section('title')
    Safe Deposit Box
@endsection

@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
    <script>
        $(function () {
            $("#sdb").DataTable();
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
                    <h4>Safe Deposit Box
                        <a href="{{ route('sdb.create') }}" class="btn btn-primary float-right btn-sm text-white">Tambah Safe Deposit Box</a>
                    </h4>
                </div>
                <div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No. SDB</th>
                                        <th>Ukuran</th>
                                        <th>No. Kunci</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                    @php($no=1)
                                    @foreach ($sdb as $item)
                                        <tr>
                                            @if ($item->status==0)
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->no_sdb }}</td>
                                                <td>{{ $item->ukuran }}</td>
                                                <td>{{ $item->no_kunci }}</td>
                                                <td>
                                                    <form action="/cs/sdb/{{$item->id}}" method="POST">
                                                        @csrf
                                                        {{-- <a href="{{ url('cs/sdb/show', $item->id) }}" class="btn btn-primary">Detail</a> --}}
                                                        <a href="{{ route('sdb.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                                        @method('DELETE')
                                                        <input type="submit" class="btn btn-danger" value="Delete">
                                                    </form>
                                                </td>
                                            @endif
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
