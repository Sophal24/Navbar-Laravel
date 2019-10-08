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

                    <form>
                        <p style="font-size: 35px;">Post</p>
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="height: 180px;" placeholder="Text to send news to client, must under 140 characters"></textarea>
                        </div>

                        
                        <a href="/api/sendsms"><button type="submit" class="btn btn-secondary btn-lg btn-block sendbg">Send</button></a>
                    </form>
                    <a href="/api/sendsms"><button type="submit" class="btn btn-secondary btn-lg btn-block sendbg">Send</button></a>
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
