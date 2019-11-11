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
                    <div class="alert alert-success" role="alert">
                        Add New Admin Failed.
                    </div>
                    <a href="/addadmin"><button type="button" class="btn btn-success">OK</button></a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
