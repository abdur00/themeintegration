@extends('layouts.app')

@section('content')

    <div class="container mb-3 mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="mt-5" style="text-align:center" >
                        <h1>Client Crud</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="GET">
                            <div class="form-group">
                              {{--  <label for="">Search</label>  --}}
                              <input type="search" value="{{ $search }}" class="row m-2" name="search" id="search" class="form-control" placeholder="Search Here" >
                              <button type="submit" class="btn btn-primary ">Search</button>
                            </div>
                        <a class="btn mt-3 btn-primary" href="{{ route('client.create') }}"> Add Client</a>
                        <table class="table table-stripped">
                            <thead>
                            <tr>
                                <th scope="col">Sr.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Notes</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                  @foreach ($clients as $client )
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td><img style=" height:100px; width:100px;" src="{{ asset($client->logo) }}" class="img-responsive" alt="logo" name="logo"></td>
                                    <td>{{ $client->notes }}</td>


                                  <td>
                                        <a href="{{ route('client.edit',$client->id) }}"> <button type="submit" class="btn btn-success">Edit</button></a>
                                        <a href="{{ route('client.delete',$client->id) }}"> <button type="submit" class="btn btn-danger">Delete</button></a>
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




    {!! $clients->links() !!}

  @endsection
