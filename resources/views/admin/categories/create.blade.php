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
                <form action="{{ route('admin.categories.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="">MEREK HP</label>
                        <input type="text" name="cat_name" id="" class="form-control" required>
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
