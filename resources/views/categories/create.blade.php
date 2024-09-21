@extends('layouts.app')
@section('title' , 'Create categories')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
<h1>@yield('title')</h1>
    <a href="{{ route('category.index') }}" class="btn btn-primary">Back</a>
</div>
<hr>
<form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{old('name')}}">
        </div>
      <button type="submit" class="btn btn-primary w-100">Ajouter</button>
    </form>
@endsection
