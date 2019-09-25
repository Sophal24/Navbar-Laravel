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
                    <div>
                        This admin log tab
                    </div>
                    
                    <div>Admin Log describes the ability for administrators to manage user access to various IT resources like systems, devices, applications, storage systems, networks, SaaS services, and more. User management is a core part to any directory service and is a basic security essential for any organization. User management enables admins to control user access and on-board and off-board users to and from IT resources. Subsequently a directory service will then authenticate, authorize, and audit user access to IT resources based on what the IT admin had dictated.
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
