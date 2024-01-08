@extends('layouts.app')
@section('title', 'Admin | Edit Golongan')

@section('content')
<div class="row mt-3 mb-3">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between">
                <h4>Edit Golongan</h4>
                <a href="" class="btn btn-primary">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.groups.update', $item->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">KODE BARANG</label>
                        <input type="text" name="kode" value="{{ $item->kode }}" id="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="">NAMA BARANG</label>
                        <input type="text" name="nama" value="{{ $item->nama }}" id="" class="form-control" required>
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
