@extends('layouts.app')

@section('content')
<form action="{{ route('contactUs.update',$contactUs->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text"  value="{{ $contactUs->name }}" class="form-control" name="name" id="name" placeholder="Enter Your Name">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" value="{{ $contactUs->description }}" class="form-control" name="description" id="description" placeholder="Add Description ">
      </div><div class="form-group">
        <label for="description">Email</label>
        <input type="text" value="{{ $contactUs->email }}" class="form-control" name="email" id="email" placeholder="Add Email ">
    </div><div class="form-group">
        <label for="description">Subject</label>
        <input type="text" value="{{ $contactUs->subject }}" class="form-control" name="subject" id="subject" placeholder="Add Subject ">
      <button type="submit" class="btn mt-3  btn-primary">Update</button>
</form>
@include('partials.error')

@endsection
