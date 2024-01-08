@extends('layouts.app')
@section('title', 'Admin | Edit Merek Hp')

@section('content')
    <div class="row mt-3 mb-3">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4>Edit Barang</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.customers.update', $p->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="golongan_id">JENIS BARANG</label>
                            <select name="golongan_id" id="golongan_id" class="form-select" >
                                @foreach ($golongan as $item)
                                @if ($p->golongan_id == $item->id)

                                <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                                @else
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>

                                @endif
                                @endforeach
                            </select>
                            @error('golongan_id')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="no">KODE BARANG</label>
                            <input type="text" name="no" value="{{ $p->no }}" id="no" class="form-control" >
                            @error('no')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama">NAMA PELANGGAN</label>
                            <input type="text" name="nama" value="{{ $p->nama }}" id="nama" class="form-control" >
                            @error('nama')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="hp">KODE BARANG</label>
                            <input type="number" name="hp" value="{{ $p->hp }}" id="hp" class="form-control" >
                            @error('hp')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="ktp">BUKTI BARANG</label>
                            <input type="file" name="ktp" value="{{ $p->ktp }}" id="ktp" class="form-control" >
                            @error('ktp')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="seri">SERI BARANG</label>
                            <input type="text" name="seri" value="{{ $p->seri }}" id="seri" class="form-control" >
                            @error('seri')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="meteran">BARANG TERJUAL</label>
                            <input type="text" name="meteran" value="{{ $p->meteran }}" id="meteran" class="form-control" >
                            @error('meteran')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="aktif">AKTIF</label>
                            <select name="aktif" id="aktif" class="form-select" >
                                @foreach ($aktif as $item)
                                @if ($p->aktif == $item)
                                    <option value="{{ $item }}" selected>{{ $item }}</option>

                                @else
                                <option value="{{ $item }}">{{ $item }}</option>

                                @endif
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
                                @if ($p->user_id == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>

                                @else

                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat">ALAMAT TOKO</label>
                            <input type="text" name="alamat" value="{{ $p->alamat }}" id="alamat" class="form-control" >
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
