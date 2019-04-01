@extends('layouts.master')
@section('content')

<form class="col-lg-8" method="POST" id="form" action="{{ action('seriesController') }}">
	{{ csrf_field() }}
  <div class="form-group row">
    <label for="title" class="col-lg-2 col-form-label">ID</label>
    <input type="text" class="form-control col-lg-5" id="title" name="title" placeholder="Title">
  </div>

  <div class="form-group row">
    <label for="releaseYear" class="col-lg-2 col-form-label">Name</label>
    <input type="text" class="form-control col-lg-5" id="releaseYear" name="releaseYear" placeholder="Release year">
  </div>

  <div class="form-group row">
    <label for="genres" class="col-lg-2 col-form-label">Mark</label>
    <select id="genres" class="form-control col-lg-5" name="genres">
      {{for($i=0;$i<10;$i++){
    		<option value="{{$i}}">{{$i}}</option>    	
      {{}}
    </select>
  </div>

  <div class="form-group row">
    <textarea class="form-control" name="summary" id="summary" rows="3" placeholder="Summary"></textarea>
  </div>

  <div class="form-group row">
  	<button type="submit" class="btn btn-primary" id="submit" style="margin-right: 20px;">Add</button>
  	<span id="error_message" class="alert alert-danger" style="padding:6px;margin:0;display:none"></span>
  	<span id="success_message" class="alert alert-success" style="padding:6px;margin:0;display:none"></span>
  </div>
</form>

@endsection