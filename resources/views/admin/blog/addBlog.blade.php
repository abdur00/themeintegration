@extends('layouts.app')

@section('content')
<form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Your Title">
      </div>
      <div class="form-group">
        <label for="name">Author</label>
        <input type="text" class="form-control" name="author" id="author" placeholder="Enter Author Name">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description">
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image" id="image" >
      </div>
      <button type="submit" class="btn mt-3 btn-primary">Create</button>
</form>
@include('partials.error')

@endsection
