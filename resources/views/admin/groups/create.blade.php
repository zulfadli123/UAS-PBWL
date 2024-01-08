@extends('layouts.app')
@section('title', 'Admin | Create Golongan')

@section('content')
<div class="row mt-3 mb-3">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between">
                <h4>Add Golongan</h4>
                <a href="{{ route('admin.groups.index') }}" class="btn btn-primary">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.groups.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="">KODE BARANG</label>
                        <input type="text" name="kode" id="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="">NAMA BARANG</label>
                        <input type="text" name="nama" id="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="SAVE" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
