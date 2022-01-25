@extends('layouts.app')

@section('content')

    <div class="container mb-3 mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="mt-5" style="text-align:center" >
                        <h1>Blog Crud</h1>
                    </div>

                    <div class="card-body">
                        <form action="" method="GET">
                            <div class="form-group">
                              {{--  <label for="">Search</label>  --}}
                              <input type="search" value="{{ $search }}" class="row m-2" name="search" id="search" class="form-control" placeholder="Search Here" >
                              <button type="submit" class="btn btn-primary ">Search</button>
                            </div>
                        </form>
                        <a class="btn mt-3 btn-primary" href="{{ route('blog.create') }}">Add Blog</a>
                        <table class="table table-stripped">
                            <thead>
                            <tr>
                                <th scope="col">Sr.</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                  @foreach ($blogs as $blog )
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->author }}</td>
                                    <td>{{ $blog->description }}</td>
                                    <td><img style=" height:100px; width:100px;" src="{{ asset($blog->image) }}" class="img-responsive" alt="image" name="image"></td>

                                  <td>
                                        <a href="{{ route('blog.edit',$blog->id) }}"> <button type="submit" class="btn btn-success">Edit</button></a>
                                        <a href="{{ route('blog.delete',$blog->id) }}"> <button type="submit" class="btn btn-danger">Delete</button></a>
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


    {!! $blogs->links() !!}



  @endsection
