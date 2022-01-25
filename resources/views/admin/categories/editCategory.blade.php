@extends('layouts.app')

@section('content')
<form action="{{ route('category.update',$category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" value="{{ $category->name }}" class="form-control" name="name" id="name" placeholder="Enter Your Category">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" value="{{ $category->description }}" class="form-control" name="description" id="description" placeholder="Add Description ">
      </div>
      <button type="submit" class="btn mt-3  btn-primary">Update</button>
</form>

@endsection
