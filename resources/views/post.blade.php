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

                        <p style="font-size: 35px;">Post</p>
                        <div class="form-group">
                            <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3" style="height: 180px;" placeholder="Text to send news to client, must be under 140 characters" required></textarea>
                        </div>

                        
                        <a href="/api/sendsms"><button type="submit" class="btn btn-secondary btn-lg btn-block sendbg">Send</button></a>
                    </form>
                    <br>
                    <br>

                    <h4>Click to Send Current Weather</h4>

                    
                    <a href="/api/sendsms" style="margin-top: 20px; font-weight: bolder;"><button type="submit" class="btn btn-warning">Send Weather Manually</button></a>
                    
                    <!-- <p style="font-size: 35px;">Post</p>
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="height: 180px;" placeholder="Text to send news to client, must under 140 characters"></textarea>
                    </div>

                    <button type="button" class="btn btn-secondary btn-lg btn-block sendbg">Send</button> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
