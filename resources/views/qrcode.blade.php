@extends('layouts.app')
@section('title','QRCode')
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
                    
                    QR Code

                    <div class="card" style="width: 18rem;">
                      <img src="qrcode.png" class="card-img-top" alt="...">
                      <div class="card-body">
                        <p class="card-text">This is the QR Code for accessing admin site. Thanks!</p>
                      </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
