@extends('layouts.app')
@section('title','Users')
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
                    
                    <nav class="navbar navbar-light bg-light">
					  <a class="navbar-brand" href="#" style="font-size: 35px;">User Management</a>

					  <form class="form-inline">
					    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						<button type="button" class="btn btn-dark">Search</button>
					  </form>
					</nav>

					<div>
						This user management tab
					</div>

					<div>User management describes the ability for administrators to manage user access to various IT resources like systems, devices, applications, storage systems, networks, SaaS services, and more. User management is a core part to any directory service and is a basic security essential for any organization. User management enables admins to control user access and on-board and off-board users to and from IT resources. Subsequently a directory service will then authenticate, authorize, and audit user access to IT resources based on what the IT admin had dictated.</div>

					<div>User management describes the ability for administrators to manage user access to various IT resources like systems, devices, applications, storage systems, networks, SaaS services, and more. User management is a core part to any directory service and is a basic security essential for any organization. User management enables admins to control user access and on-board and off-board users to and from IT resources. Subsequently a directory service will then authenticate, authorize, and audit user access to IT resources based on what the IT admin had dictated.</div>
					<br>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
