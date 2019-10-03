@extends('layouts.app')
@section('title','Users')
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
                    
                    <nav class="navbar navbar-light bg-light">
					             <a class="navbar-brand" href="#" style="font-size: 35px;">Users</a>

      					   <form class="form-inline">
      					    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      						<button type="button" class="btn btn-dark">Search</button>
      					  </form>
					         </nav>

        					<div>
                      Total Users : {{ $count }}
        					</div>

                  <table class="table table-hover">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">SubscriberId</th>
                        <th scope="col">Status</th>
                        <th scope="col">Frequency</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach($data as $row)
                      <tr>
                        <th scope="row">{{$row->id}}</th>
                        <td>{{$row->subscriberId}}</td>
                        <td>{{$row->status}}</td>
                        <td>{{$row->frequency}}</td>
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
