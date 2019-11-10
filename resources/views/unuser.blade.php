@extends('layouts.app')
@section('title','Users')
@section('content')
<div class="container table-responsive">
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
					             <a class="navbar-brand" href="/unuser" style="font-size: 35px;color: red;">Unsubscriber</a>

      					   <form class="form-inline">
                  <a href="/user"><button type="button" class="btn btn-success"><i class="fas fa-caret-right"></i> Go to Subscribers</button></a>
      					  </form>
					         </nav>

        					<div>
                      Unsubscriber : {{ $count }}
        					</div>

                  <table class="table table-hover table-bordered table-sm">
                    <thead class="tablebg">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">SubscriberId</th>
                        <th scope="col">Status</th>
                        <th scope="col">Frequency</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach($data as $row)
                      <tr>
                        <th scope="row">{{ $row->id }}</th>
                        <td>{{ Str::limit($row->subscriberId,15) }}</td>
                        <!-- <td>{{ $row->subscriberId }}</td> -->
                        <td>{{ $row->status }}</td>
                        <td>Monthly</td>
                        <td><a onclick="return confirm('Do you want to delete this user?')" href="/delete/{{ $row->id }}"><button type="button" class="badge badge-danger"><i class="fas fa-times"></i> Delete</button></a></td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                  {{ $data->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
