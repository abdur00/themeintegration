@extends('layouts.app')

@section('content')
<form action="{{ route('category.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Category">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" id="description" placeholder="Add Description ">
      </div>
      <button type="submit" class="mt-3 btn btn-primary">Create</button>
</form>

@endsection
