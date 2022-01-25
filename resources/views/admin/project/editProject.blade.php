@extends('layouts.app')

@section('content')
<form action="{{ route('project.update',$project->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" value="{{ $project->name }}" class="form-control" name="name" id="name" placeholder="Enter Your Category">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" value="{{ $project->description }}" class="form-control" name="description" id="description" placeholder="Add Description ">
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image" id="image" >
        <img style=" height:100px; width:100px;" src="{{ asset($project->image) }}" class="mt-2 img-responsive" alt="image" name="image">
      </div>
      <button type="submit" class="btn mt-3  btn-primary">Update</button>
</form>

@endsection
