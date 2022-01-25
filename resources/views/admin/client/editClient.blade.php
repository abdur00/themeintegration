@extends('layouts.app')

@section('content')
<form action="{{ route('client.update',$client->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" value="{{ $client->name }}" class="form-control" name="name" id="name" placeholder="Enter Your Category">
      </div>
      <div class="form-group">
        <label for="description">Notes</label>
        <input type="text" value="{{ $client->notes }}" class="form-control" name="notes" id="notes" placeholder="Add Description ">
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="logo" id="logo" >
        <img style=" height:100px; width:100px;" src="{{ asset($client->logo) }}" class="mt-2 img-responsive" alt="logo" name="logo">
      </div>
      <button type="submit" class="btn mt-3  btn-primary">Update</button>
</form>

@endsection
