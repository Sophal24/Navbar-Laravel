@extends('layouts.app')
@section('title','Admins')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                  <p style="font-size: 35px; color: green;">Admins</p>

                  <table class="table table-hover table-sm">
                    <thead class="tablebg">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                          <th scope="row">{{$row->id}}</th>
                          <td>{{$row->name}}</td>
                          <td>{{$row->email}}</td>
                          <td><a onclick="return confirm('Delete This Admin?')" href="#"><button type="button" class="btn btn-danger">Dismiss</button></a> <a href="#"><button type="button" class="btn btn-info" style="margin-left: 5px;">Edit</button></a></td>
                        </tr>
                        @endforeach

                      </tbody>
                    
                  </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
