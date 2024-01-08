@extends('layouts.app')
@section('title', 'Admin | Data Barang')

@section('content')
    <div class="row mt-3 mb-3">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between">
                    <h4>Data Barang</h4>
                    <a href="{{ route('admin.customers.create') }}" class="btn btn-primary">Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>JENIS BARANG</th>
                                <th>NO</th>
                                <th>NAMA PELANGGAN</th>
                                <th>KODE BARANG</th>
                                <th>ACTION</th>
                            </tr>
                            @foreach ($customer as $item)
                            <tr>
                                <td width="5%">{{ $item->id }}</td>
                                <td>{{ $item->golongan->nama }}</td>
                                <td>{{ $item->no }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->hp }}</td>
                                <td width="20%">
                                    <a href="{{ route('admin.customers.show', $item->id) }}" class="btn btn-primary">Show</a>
                                    <a href="{{ route('admin.customers.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('admin.customers.destroy', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
