@extends('layouts.app')
@section('title' , 'Edit Products')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
<h1>@yield('title')</h1>
    <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
</div>
<hr>
<form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{old('name',$product->name)}}">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea type="text" name="description" class="form-control">{{old('description',$product->description)}}</textarea>
        </div>

        <div class="mb-3">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{old('quantity',$product->quantity)}}">
        </div>

        <div class="mb-3">
            <label>image</label>
            <input type="file" name="image" class="form-control">
            @if ($product->image)
                <img width="100" src="/storage/{{$product->image}}" alt="">
            @endif
        </div>

        <div class="mb-3">
            <label>price</label>
            <input type="number" name="price" class="form-control" value="{{old('price',$product->price)}}">
        </div>

        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="">Select Category...</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

        </div>

      <button type="submit" class="btn btn-primary w-100">Update</button>
    </form>
@endsection
