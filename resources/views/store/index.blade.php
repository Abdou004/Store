@extends('layouts.app')
@section('title' , 'Home')

@section('content')

    <h1>Products</h1>
    <hr>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($products as $product)
        <div class="col">
    <div class="card h-100">

    <img width="200px"  height="350px" src="storage/{{$product->image}}" class="card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title">{{$product->name}}</h5>
        <p class="card-text">{{$product->description}}</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <span class="badge bg-success">Q : {{$product->quantity}}</span>
            <span class="badge bg-primary"> MAD {{$product->price}} </span>
            <span class="badge bg-info">{{$product->Category->name}}</span>
        </div>
        <div class="my-2 mx-auto">
            <small class="text-muted">{{$product->updated_at->format('m/y')}}</small>
        </div>
    </div>
</div>
    @endforeach
</div>

    {{$products->links()}}
@endsection
