@extends('layouts.app')
@section('title', 'Admin | Create Merek Hp')

@section('content')
    <div class="row mt-3 mb-3">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4>Add Merek Hp</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.customers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="golongan_id">JENIS BARANG</label>
                            <select name="golongan_id" id="golongan_id" class="form-select" >
                                @foreach ($golongan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('golongan_id')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="no">KODE BARANG</label>
                            <input type="text" name="no" id="no" class="form-control" >
                            @error('no')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama">NAMA PELANGGAN</label>
                            <input type="text" name="nama" id="nama" class="form-control" >
                            @error('nama')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="hp">JUMLAH BARANG MASUK</label>
                            <input type="number" name="hp" id="hp" class="form-control" >
                            @error('hp')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="ktp">BUKTI BARANG</label>
                            <input type="file" name="ktp" id="ktp" class="form-control" >
                            @error('ktp')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="seri">SERI BARANG</label>
                            <input type="text" name="seri" id="seri" class="form-control" >
                            @error('seri')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="meteran">BARANG TERJUAL</label>
                            <input type="text" name="meteran" id="meteran" class="form-control" >
                            @error('meteran')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="aktif">AKTIF</label>
                            <select name="aktif" id="aktif" class="form-select" >
                                @foreach ($aktif as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            @error('aktif')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="user_id">USER</label>
                            <select name="user_id" id="user_id" class="form-select" >
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat">ALAMAT TOKO</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <button type="submit" value="SAVE" class="btn btn-primary">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
