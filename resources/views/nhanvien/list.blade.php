@extends('layouts.app')
@section('content')
    <div class="card" style="margin-top: 10px">
        <div class="card-body">
            <div class="card-title text-center"><h1>List</h1></div>
            <div class="d-flex">
                <div>
                    <a href="{{ route('nhanvien.create') }}"><button class="btn btn-info">Add</button></a>
                </div>

                <div style="margin-left: 30px">
                    <form action="{{ route('nhanvien.index') }}" method="GET">
                        <section class="d-flex">
                            <div style="margin-right: 5px">
                                <button type="submit" class="btn btn-success">Search</button>
                            </div>
                            
                            <div>
                                <input class="form-control" type="text" name="search" value="{{ old('search') }}">
                            </div>
                        </section>
                    </form>
                </div>
            </div>
            <table class="table table-bordered" style="margin-top: 10px">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tel</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nhanvien as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->tel }}</td>
                            <td>
                                <div class="d-flex">
                                    <div style="margin-right: 5px">
                                        <a href="{{ route('nhanvien.edit', ['nhanvien' => $item->id]) }}"><button class="btn btn-warning">Edit</button></a>
                                    </div>
                                    <div>
                                        <form action="{{ route('nhanvien.destroy', ['nhanvien' => $item->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button onclick="return confirm('Do you want to delete this?')" type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $nhanvien->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
@endsection