@extends('layouts.app')
@section('title' , 'Categorys')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>{{$category->name}}'s</h1>
        <a href="{{ route('category.index') }}" class="btn btn-primary">Back</a>
    </div>
    <hr>

    <table class="table table-bordered table-hover">
        <caption>List of {{$category->name}}'s</caption>
        <thead>
            <tr class="table-success">
                <th>#ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr class="table-primary">
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->quantity}}</td>
                <td><img width="100px" height="100px" src="{{asset('storage/' . $product->image)}}" alt=""></td>
                <td>{{$product->price}}</td>
                <th>
                   <div class="d-flex">

                       <a class="btn btn-primary me-2" href="{{route('product.edit',$product->id)}}" type="button">Update</a>
                       <form action="{{route('product.destroy',$product->id)}}" method="post" >
                           @csrf
                           <button class="btn btn-danger">Delete</button></th>
                           @method('DELETE')
                       </form>

                </div>
            </tr>
            @empty
            <tr>
                <td colspan="6" align="center"><h6>EMPTY.</h6></td>
            </tr>
            @endforelse

        </tbody>
    </table>
@endsection
