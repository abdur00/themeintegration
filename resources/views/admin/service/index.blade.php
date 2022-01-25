@extends('layouts.app')

@section('content')

    <div class="container mb-3 mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="mt-5" style="text-align:center" >
                        <h1>Service Crud</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="GET">
                            <div class="form-group">
                              {{--  <label for="">Search</label>  --}}
                              <input type="search" value="{{ $search }}" class="row m-2" name="search" id="search" class="form-control" placeholder="Search Here" >
                              <button type="submit" class="btn btn-primary ">Search</button>
                            </div>
                        <a class="btn mt-3 btn-primary" href="{{ route('service.create') }}">  Add Service</a>
                        <table class="table table-stripped">
                            <thead>
                            <tr>
                                <th scope="col">Sr.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                  @foreach ($services as $service )
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $service->name }}</td>
                                    <td>{{ $service->description }}</td>
                                    <td><img style=" height:50px; width:50px;" src="{{ $service->image }}" class="img-responsive" alt="image" name="image"></td>
                                    <td><img style=" height:50px; width:50px;" src="{{ $service->icon }}" class="img-responsive" alt="icon" name="icon"></td>
                                    <td>
                                        <a href="{{ route('service.edit',$service->id) }}"> <button type="submit" class="btn btn-success">Edit</button></a>
                                        <a href="{{ route('service.delete',$service->id) }}"> <button type="submit" class="btn btn-danger">Delete</button></a>
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



    {!! $services->links() !!}


  @endsection
