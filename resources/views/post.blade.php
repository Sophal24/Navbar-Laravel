@extends('layouts.app')
@section('title','Post')
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


                    <form method="post" action="/textarea">
                        
                        {{ csrf_field() }}

                        <h2 style="font-size: 35px;">Post</h2>
                        <div class="form-group">
                            <textarea class="form-control" maxlength="250" name="text" id="exampleFormControlTextarea1" rows="3" style="height: 180px;" placeholder="Text to send news to client, must be under 250 characters" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-secondary btn-lg btn-block btn-info" style="margin-top: 33px;">Send</button>


                    </form >
                    
                    <hr style="border: 0;
                    height: 1px;
                    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));margin-top: 30px;">

                    <h4>Click to Send Current Weather</h4>

                    <a onclick="return confirm('Are You Sure To Send?')" href="/sendsms"><button class="btn btn-warning">Send Current Weather</button></i></a>
                

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
