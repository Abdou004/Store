@extends('layouts.app')
@section('title' , 'Products')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Products List</h1>
        <a href="{{ route('product.create') }}" class="btn btn-primary">Create</a>
    </div>
    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>
                    <a href="{{route('category.show',$product->category)}}">
                    <span class="badge bg-success">{{$product->category?->name}}</span>
                    </a>
                </td>
                <td>{{$product->quantity}}</td>
                <td><img width="100px" height="100px" src="storage/{{$product->image}}" alt=""></td>
                <th style="white-space: nowrap;">
                    {{$product->price}} <span>MAD</span>
                </th>

                <th><a class="btn btn-primary" href="{{route('product.edit',$product->id)}}" type="button">Update</a></th>
                <form action="{{route('product.destroy',$product->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <th><button class="btn btn-danger">Delete</button></th>
                </form>
            </tr>
            @empty
            <tr>
                <td colspan="6" align="center"><h6>EMPTY.</h6></td>
            </tr>
            @endforelse

        </tbody>
    </table>
    {{$products->links()}}
@endsection
