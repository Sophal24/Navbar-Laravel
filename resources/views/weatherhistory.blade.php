@extends('layouts.app')
@section('title','WeatherHistory')
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

                    <table class="table table-hover table-dark">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Description</th>
                          <th scope="col">Max Tem</th>
                          <th scope="col">Min Tem</th>
                          <th scope="col">Day Rain</th>
                          <th scope="col">Night Rain</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Nothing to say</td>
                          <td>32</td>
                          <td>26</td>
                          <td>47</td>
                          <td>40</td>
                        </tr>
                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
