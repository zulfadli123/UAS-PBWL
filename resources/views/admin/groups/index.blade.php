@extends('layouts.app')
@section('title', 'Admin | Data Golongan')

@section('content')
    <div class="row mt-3 mb-3">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between">
                    <h4>Data Golongan</h4>
                    <a href="{{ route('admin.groups.create') }}" class="btn btn-primary">Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>KODE BARANG</th>
                                <th>NAMA BARANG</th>
                                <th>ACTION</th>
                            </tr>
                            @foreach ($golongan as $item)
                            <tr>
                                <td width="5%">{{ $item->id }}</td>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->nama }}</td>
                                <td width="14%">
                                    <a href="{{ route('admin.groups.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('admin.groups.destroy', $item->id) }}" method="post" class="d-inline">
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
