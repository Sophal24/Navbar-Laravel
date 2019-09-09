@extends('layout')
@section('title','Post-Alert')
@section('mycontent')

	<nav class="navbar sticky-top navbar-light bg-light">
	  <a class="navbar-brand" href="#" style="font-size: 35px;">Post</a>
	</nav>
	<div class="form-group">
	    <!-- <label for="exampleFormControlTextarea1">News Spreading Area</label> -->
	    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="height: 180px;" placeholder="Text to send news to client . . ."></textarea>
	</div>

	<button type="button" class="btn btn-primary btn-lg btn-block">Send</button> 
	
@endsection