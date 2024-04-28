@extends('layouts.app')
@section('content')
    <div class="card" style="margin-top: 120px">
        <div class="card-body">
            <div class="card-title text-center"><h1>Edit</h1></div>
            @if ($errors->has('name'))
                <div class="alert alert-danger" role="alert">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            @endif
            @if ($errors->has('email'))
                <div class="alert alert-danger" role="alert">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            @endif
            @if ($errors->has('tel'))
                <div class="alert alert-danger" role="alert">
                    @error('tel')
                        {{ $message }}
                    @enderror
                </div>
            @endif
            <form action="{{ route('nhanvien.update', ['nhanvien' => $nhanvien->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" id="" name="name" value="{{ old('name', $nhanvien->name) }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" id="" name="email" value="{{ old('email', $nhanvien->email) }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tel</label>
                    <input type="text" class="form-control" id="" name="tel" value="{{ old('tel', $nhanvien->tel) }}">
                </div>
                <div style="display: flex">
                    <button type="submit" class="btn btn-primary" style="margin-right: 10px">Update</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" style="margin-right: 10px">Delete</button>
                    <a href="{{ route('nhanvien.index') }}"><button type="button" class="btn btn-warning">Back</button></a>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{ route('nhanvien.destroy', ['nhanvien' => $nhanvien->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection