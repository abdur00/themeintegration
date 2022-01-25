@extends('layouts.app')

@section('content')
<form action="{{ route('blog.update',$blog->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text"  value="{{ $blog->title }}" class="form-control" name="title" id="title" placeholder="Enter Your Blog">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" value="{{ $blog->description }}" class="form-control" name="description" id="description" placeholder="Add Description ">
      </div><div class="form-group">
        <label for="Author">Author</label>
        <input type="text" value="{{ $blog->author }}" class="form-control" name="author" id="author" placeholder="Add Designation ">
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image" id="image" >
        <img style="height:100px; width:100px;" src="{{ asset($blog->image) }}" class=" mt-2 img-responsive" alt="image" name="image">
      </div>
      <button type="submit" class="btn mt-3  btn-primary">Update</button>
</form>
@include('partials.error')

@endsection

