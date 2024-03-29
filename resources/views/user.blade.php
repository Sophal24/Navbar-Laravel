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
					             <a class="navbar-brand" href="/user" style="font-size: 35px;color: green;">Subscribers</a>

      					       <form class="form-inline">
                        <a href="unuser"><button type="button" class="btn btn-warning"><i class="fas fa-caret-right"></i> Go to Unsubscriber</button></a>
      					       </form>
					         </nav>

        					<div>
                      Active Users : {{ $count }}
        					</div>

                  <table class="table table-hover table-sm">
                    <thead class="tablebg">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">SubscriberId</th>
                        <th scope="col">Status</th>
                        <!-- <th scope="col">Frequency</th> -->
                        <th scope="col">Date</th>
                        <!-- <th scope="col">Delete</th> -->
                        
                      </tr>
                    </thead>
                    <tbody style="font-size: 18px;">

                      @foreach($data as $row)
                      <tr>
                        <th scope="row">{{ $row->id }}</th>
                        <td>{{ Str::limit($row->subscriberId,15) }}</td>
                        <!-- <td>{{ $row->subscriberId }}</td> -->
                        <td>{{ $row->status }}</td>
                        <td>{{ $row->created_at }} UTC</td>
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
