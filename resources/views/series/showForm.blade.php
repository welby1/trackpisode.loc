@extends('layouts.master')
@section('content')

<form class="col-lg-8" method="POST" action="/add_series">
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
    <textarea class="form-control" name="summary" rows="3" placeholder="Summary"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Add</button>
</form>

@endsection