@extends('layouts.app')
@section('title', 'Admin | Edit Merek Hp')

@section('content')
<div class="row mt-3 mb-3">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <h4>Edit Merek Hp</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.update', $row->cat_id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">MEREK HP</label>
                        <input type="text" name="cat_name" id="" class="form-control" value="{{ $row->cat_name }}" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="UPDATE" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
