@extends('layouts.app')

@section('content')
<form action="{{ route('contactUs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name"  placeholder="Enter Description">
      </div>
      <div class="form-group">
        <label for="name">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email ">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description">
      </div>
      <div class="form-group">
        <label for="description">Subject</label>
        <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter Subject">
      </div>
      <button type="submit" class="btn mt-3 btn-primary">Create</button>
</form>
@include('partials.error')

@endsection
