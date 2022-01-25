@extends('layouts.app')

@section('content')

    <div class="container mb-3 mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="mt-5" style="text-align:center" >
                        <h1>Category Crud</h1>
                    </div>
                    <div class="card-body">
                        {{--  <form action="" method="GET">
                            <div class="form-group">
                              <label for="">Search</label>
                              <input type="text" value="{{ $search }}" class="row m-2" name="search" id="search" class="form-control" placeholder="Search Here" >
                              <button type="submit" class="btn btn-primary ">Search</button>
                            </div>
                          <a class=" mt-2 btn btn-primary" href="{{ route('category.add') }}"> Add Category</a>  --}}
                        <!-- Button trigger modal -->
<button type="button" data-bs-toggle="modal"  data-bs-target="#exampleModal" id="exampleModalLabel"  class=" create btn btn-primary mt-2">
  Add Category
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      <div class="modal-body">
<form action="{{ $category ? route('category.update',$category->id)  :  route('category.store') }}" method="Post">
     @include('admin.categories.form')
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

                        <table class="table table-stripped">
                            <thead>
                            <tr>
                                <th scope="col">Sr.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category )
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        {{--  <a href="{{ route('category.edit',$category->id) }}"></a>  --}}

                                            <button type="submit"  data-bs-toggle="modal"  data-bs-target="#exampleModal" data-id="{{ $category->id }}" id="btn12" class="edit btn btn-success">Edit</button>
                                        <a href="{{ route('category.delete',$category->id) }}"> <button type="submit"  class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! $categories->links() !!}




  @endsection
