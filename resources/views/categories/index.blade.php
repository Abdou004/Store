@extends('users.admin.app')
@section('title' , 'Categorys')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Categories List</h1>
        <a href="{{ route('category.create') }}" class="btn btn-primary">Create</a>
    </div>
    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>

                <th><a class="btn btn-info" href="{{route('category.show',$category->id)}}" type="button">Show</a>
                <a class="btn btn-primary" href="{{route('category.edit',$category->id)}}" type="button">Update</a>
                <form action="{{route('category.destroy',$category->id)}}" method="post" style="display: inline;">
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                    @method('DELETE')
                </form>
                </th>

            </tr>
            @empty
            <tr>
                <td colspan="6" align="center"><h6>EMPTY.</h6></td>
            </tr>
            @endforelse

        </tbody>
    </table>
@endsection
