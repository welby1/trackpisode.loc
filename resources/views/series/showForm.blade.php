@extends('layouts.master')
@section('content')

<form class="col-lg-8" method="POST" action="{{ action('seriesController@addSeries') }}">
	{{ csrf_field() }}
  <div class="form-group row">
    <label for="title" class="col-lg-2 col-form-label">Title</label>
    <input type="text" class="form-control col-lg-5" id="title" name="title" placeholder="Title">
  </div>

  <div class="form-group row">
    <label for="releaseYear" class="col-lg-2 col-form-label">Release year</label>
    <input type="text" class="form-control col-lg-5" id="releaseYear" name="releaseYear" placeholder="Release year">
  </div>

  <div class="form-group row">
    <label for="genres" class="col-lg-2 col-form-label">Genre</label>
    <select id="genres" class="form-control col-lg-5" name="genres">
	    @foreach($genres as $g)
    		<option value="{{$g->id}}">{{$g->name}}</option>
    	@endforeach
    </select>
  </div>

  <div class="form-group row">
    <textarea class="form-control" name="summary" rows="3" placeholder="Summary"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Add</button>
</form>

@endsection