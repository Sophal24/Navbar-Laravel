@extends('layouts.app')
@section('title','WeatherHistory')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- <div class="col-md-8"> -->
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                      Total Weather History : {{ $count }} times
                    </div>

                    <table class="table table-hover">
                      <thead class="tablebg">
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Description</th>
                          <th scope="col">Max Tem</th>
                          <th scope="col">Min Tem</th>
                          <th scope="col">Day Rain</th>
                          <th scope="col">Night Rain</th>
                          <th scope="col">Date</th>
                        </tr>
                      </thead>
                      <tbody style="font-size: 15px;">
                        
                        @foreach($data as $row)
                        <tr class="table-info">
                          <th scope="row">{{$row->id}}</th>
                          <td>{{$row->description}}</td>
                          <td>{{$row->max_tem}}</td>
                          <td>{{$row->min_tem}}</td>
                          <td>{{$row->day_rain}}</td>
                          <td>{{$row->night_rain}}</td>
                          <td>{{$row->date}}</td>
                        </tr>
                        @endforeach

                      </tbody>
                    </table>

                <div>
            </div>
        <!-- <div> -->
    </div>
</div>
@endsection
