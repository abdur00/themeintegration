@extends('layouts.app')

@section('content')
<form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="notes" id="notes" placeholder="Add Notes ">
      </div>
      <div class="form-group">
        <label for="image">Logo</label>
        <input type="file" class="form-control" name="logo" id="logo" >
      </div>
      <button type="submit" class="btn mt-3 btn-primary">Create</button>
</form>

@endsection
