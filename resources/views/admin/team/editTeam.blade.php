@extends('layouts.app')

@section('content')
<form action="{{ route('team.update',$team->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" value="{{ $team->name }}" class="form-control" name="name" id="name" placeholder="Enter Your Team">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" value="{{ $team->description }}" class="form-control" name="description" id="description" placeholder="Add Description ">
      </div><div class="form-group">
        <label for="description">designation</label>
        <input type="text" value="{{ $team->designation }}" class="form-control" name="designation" id="designation" placeholder="Add Designation ">
      </div><div class="form-group">
        <label for="description">Facebook</label>
        <input type="text" value="{{ $team->facebook }}" class="form-control" name="facebook" id="facebook" placeholder="Add Facebook ">
      </div><div class="form-group">
        <label for="description">Twitter</label>
        <input type="text" value="{{ $team->twitter }}" class="form-control" name="twitter" id="twitter" placeholder="Add Twitter ">
      </div><div class="form-group">
        <label for="description">Linkedin</label>
        <input type="text" value="{{ $team->linkedin }}" class="form-control" name="linkedin" id="linkedin" placeholder="Add Linkedin ">
      </div><div class="form-group">
        <label for="description">Youtube</label>
        <input type="text" value="{{ $team->youtube }}" class="form-control" name="youtube" id="youtube" placeholder="Add Youtube ">
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image" id="image" >
        <img style=" height:100px; width:100px;" src="{{ asset($team->image) }}" class="mt-2 img-responsive" alt="image" name="image">
      </div>
      <button type="submit" class="btn mt-3  btn-primary">Update</button>
</form>
@include('partials.error')

@endsection

