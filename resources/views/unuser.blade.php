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
					             <a class="navbar-brand" href="/unuser" style="font-size: 35px;">Unsubscriber</a>

      					   <form class="form-inline">
                  <a href="/user"><button type="button" class="btn btn-success">Users</button></a>
      					  </form>
					         </nav>

        					<div>
                      Total Users : {{ $count }}

        					</div>

                  <table class="table table-hover">
                    <thead class="tablebg">
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
                        <th scope="row">{{ $row->id }}</th>
                        <td>{{ Str::limit($row->subscriberId,15) }}</td>
                        <!-- <td>{{ $row->subscriberId }}</td> -->
                        <td>{{ $row->status }}</td>
                        <td>{{ $row->frequency }}</td>
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
