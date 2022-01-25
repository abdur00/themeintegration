@extends('layouts.app')

@section('content')
<form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Project">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" id="description" placeholder="Add Description ">
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image" id="image" >
      </div>
      <button type="submit" class="btn mt-3 btn-primary">Create</button>
</form>

@endsection
