@extends('layouts.app')

@section('content')
<form action="{{ route('service.update',$service->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" value="{{ $service->name }}" class="form-control" name="name" id="name" placeholder="Enter Your Category">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" value="{{ $service->description }}" class="form-control" name="description" id="description" placeholder="Add Description ">
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image" id="image" >
        <img style=" height:100px; width:100px;" src="{{ asset($service->image) }}" class="img-responsive" alt="image" name="image">
      </div>
      <label for="icon">Icon</label>
        <input type="file" class="form-control" name="icon" id="iconx" >
        <img style="height:100px; width:100px;" src="{{ asset($service->icon) }}" class="img-responsive mt-2" alt="icon" name="icon">
      </div>
      <button type="submit" class="btn mt-3  btn-primary">Update</button>
</form>
@include('partials.error')

@endsection

