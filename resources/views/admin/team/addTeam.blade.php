@extends('layouts.app')

@section('content')
<form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name">
      </div>
      <div class="form-group">
        <label for="name">Designation</label>
        <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter Designation">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description">
      </div>
      <div class="form-group">
        <label for="facebook">Facebook</label>
        <input type="url" class="form-control" name="facebook" id="facebook" placeholder="Add Facebook Link">
      </div>
      <div class="form-group">
        <label for="twitter">Twitter</label>
        <input type="url" class="form-control" name="twitter" id="twitter" placeholder="Add Twitter Link">
      </div>
      <div class="form-group">
        <label for="linkedIn">linkedIn</label>
        <input type="url" class="form-control" name="linkedin" id="linkedin" placeholder="Add linkedin Link">
      </div>
      <div class="form-group">
        <label for="youtube">Youtube</label>
        <input type="url" class="form-control" name="youtube" id="youtube" placeholder="Add youtube ">
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image" id="image" >
      </div>
      <button type="submit" class="btn mt-3 btn-primary">Create</button>
</form>
@include('partials.error')

@endsection
