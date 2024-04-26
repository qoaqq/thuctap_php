@extends('layouts.app')
@section('content')
    <div class="card" style="margin-top: 10px">
        <div class="card-body">
            <div class="card-title text-center"><h1>List</h1></div>
            <div>
                <a href="{{ route('nhanvien.create') }}"><button class="btn btn-info">Add</button></a>
            </div>
            <table class="table">
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
                                <div>
                                    <a href="{{ route('nhanvien.edit', ['nhanvien' => $item->id]) }}"><button class="btn btn-warning">Edit</button></a>
                                </div>
                                <div>
                                    <form action="{{ route('nhanvien.destroy', ['nhanvien' => $item->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button onclick="return confirm('Do you want to delete this?')" type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection