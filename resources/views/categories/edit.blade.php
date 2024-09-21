@extends('layouts.app')
@section('title' , 'Edit catigory')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
<h1>@yield('title')</h1>
    <a href="{{ route('category.index') }}" class="btn btn-primary">Back</a>
</div>
<hr>
<form action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{old('name',$category->name)}}">
        </div>
      <button type="submit" class="btn btn-primary w-100">Update</button>
    </form>
@endsection
