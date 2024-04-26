@extends('layouts.app')
@section('content')
    <div class="card" style="margin-top: 120px">
        <div class="card-body">
            <div class="card-title text-center"><h1>Add</h1></div>
            <form action="{{ route('nhanvien.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" id="" name="name" value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" id="" name="email" value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tel</label>
                    <input type="text" class="form-control" id="" name="tel" value="{{ old('tel') }}">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection