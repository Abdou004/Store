@extends('layouts.app')
@section('title' , 'Home')
@section('side_bar')
    <h1>Filter</h1>
    <form method="get" id="filterForm">
        <div class="form-group">
            <label for="name">Name or Description</label>
            <input type="text" name="name" id="name" class="form-control" value="{{Request::input('name')}}" placeholder="Name">
        </div>

        <div class="form-group">
            <label for="name">Category Name</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="">Select Category...</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if(old('category_id', Request::input('category_id')) == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <h3>Pricing</h3>
        <div class="form-group">
            <label for="name">Min</label>
            <input type="number" name="min" id="min" class="form-control" value="{{Request::input('min')}}">
            <label for="name">Max</label>
            <input type="number" name="max" id="max" class="form-control" value="{{Request::input('max')}}">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-outline-primary " value="Filer" placeholder="" >
            <button type="button" class="btn btn-outline-secondary" id="resetButton" value="Reset">Reset</button>
        </div>
    </form>
    <script>
        document.getElementById('resetButton').addEventListener('click', function() {
            // Clear all input fields in the form
            document.getElementById('filterForm').reset();

            // Remove query parameters by redirecting to the base route
            window.location.href = "{{ route('store.index') }}";
        });
    </script>
@endsection
@section('content')

    <h1>Products</h1>

    <hr>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($products as $product)
        <div class="col">
    <div class="card h-100">

    <img  height="280px" src="storage/{{$product->image}}" class="card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title">{{$product->name}}</h5>
        <p class="card-text">{{$product->description}}</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <span class="badge bg-success">Q : {{$product->quantity}}</span>
            <span class="badge bg-primary"> MAD {{$product->price}} </span>
            <span class="badge bg-info">{{$product->category->name}}</span>
        </div>
        <div class="my-2 mx-auto">
            <small class="text-muted">{{$product->updated_at->format('m/y')}}</small>
        </div>
    </div>

</div>
    @endforeach
</div>

@endsection
