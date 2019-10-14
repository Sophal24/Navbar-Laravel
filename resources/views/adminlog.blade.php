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
                    <h3 style="font-size: 35px;">Admin Log</h3>
                    

                    <table class="table table-hover">
                      <thead class="tablebg">
                        <tr>
                          <th scope="col">Subscribers</th>
                          <th scope="col">Weather History</th>
                          <th scope="col">Unsubscribers</th>
                          <th scope="col">Refresh</th>
                        </tr>
                      </thead>

                      <tbody>
                        <tr>
                          <td scope="row">{{ $countsub }} users</td>
                          <td>{{ $countwe }} times</td>
                          <td>{{ $countunsub }} users</td>
                          <td><a href="/adminlog"><button type="button" class="btn btn-warning" >Refresh</button></a></td>
                        </tr>
                      </tbody>
                    </table>

                    <hr style="border: 0;
    height: 1px;
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">
    
                    <h3>Last Message that was manually send : </h3>

                    <table class="table table-hover">
                      <thead class="tablebg">
                        <tr>
                          <th scope="col">Text Message</th>
                          <th scope="col">Date of Send</th>

                        </tr>
                      </thead>

                      <tbody>
                        <tr>
                          <td scope="row">{{ $lastmessage }}</td>
                          <td>{{ $lastdate }}</td>
                        </tr>
                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
