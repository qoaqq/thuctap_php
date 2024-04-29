@extends('layouts.app')
@section('content')
    <div class="card" style="margin-top: 120px">
        <div class="card-body">
            <div class="card-title text-center"><h1>Add</h1></div>
            @if ($errors->has('name'))
                <div class="alert alert-danger" role="alert">
                    @error('name')
                        {{ strip_tags($message) }}
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

            <form action="{{ route('nhanvien.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" id="" name="name" value="{{ old('name') ? strip_tags(old('name')) : '' }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" id="" name="email" value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tel</label>
                    <input type="text" class="form-control" id="" name="tel" value="{{ old('tel') }}">
                </div>
                <div style="display: flex;">
                    <button type="submit" class="btn btn-primary" style="margin-right: 10px">Register</button>
                    <a href="{{ route('nhanvien.index') }}"><button type="button" class="btn btn-warning">Back</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
