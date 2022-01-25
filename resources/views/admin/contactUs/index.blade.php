@extends('layouts.app')

@section('content')

    <div class="container mb-3 mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="mt-5" style="text-align:center" >
                        <h1>ContactUs Crud</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="GET">
                            <div class="form-group">
                              {{--  <label for="">Search</label>  --}}
                              <input type="search" value="{{ $search }}" class="row m-2" name="search" id="search" class="form-control" placeholder="Search Here" >
                              <button type="submit" class="btn btn-primary ">Search</button>
                            </div>
                        <a class="btn mt-3 btn-primary" href="{{ route('contactUs.create') }}"> Add Contact</a>
                        <div style="overflow-x:auto;">
                            <table class="table table-stripped">
                                <thead>
                                <tr>
                                    <th scope="col">Sr.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                        @foreach ($contactsUs as $contactUs )
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $contactUs->name }}</td>
                                        <td>{{ $contactUs->email }}</td>
                                        <td>{{ $contactUs->subject }}</td>
                                        <td>{{ $contactUs->description }}</td>

                                      <td>
                                            <a href="{{ route('contactUs.edit',$contactUs->id) }}"> <button type="submit" class="btn btn-success">Edit</button></a>
                                            <a href="{{ route('contactUs.delete',$contactUs->id) }}"> <button type="submit" class="btn btn-danger">Delete</button></a>
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
    </div>




{!! $contactsUs->links() !!}


  @endsection
