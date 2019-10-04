@extends('layouts.app')
@section('title','Admin Log')
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
                  
                    <!-- nav class="navbar sticky-top navbar-light bg-light">
                      <a class="navbar-brand" href="#" style="font-size: 35px;">Admin Log</a>
                    </nav> -->
                    <p style="font-size: 35px;">Admin Log</p>
                    

                    <table class="table table-hover">

                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">Total Users</th>
                          <th scope="col">All Time Weather History</th>
                          <th scope="col">Refresh</th>
                        </tr>
                      </thead>

                      <tbody>
                        <tr>
                          <td scope="row">{{ $countsub }} users</td>
                          <td>{{ $countwe }} times</td>
                          <td><a href="/adminlog"><button type="button" class="btn btn-dark">Refresh</button></a></td>
                        </tr>
                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
