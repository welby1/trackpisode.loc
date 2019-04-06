@extends('layouts.master')
@section('content')
<div class="row">
	<div class="row col-lg-4 offset-lg-4"><h3 class="custom-h3">Shows</h3></div>
	<div class="row customRowTopRated">
		@foreach ($series as $s)
			<div class="col-lg-4">
		        <div class="imgBlock rounded">
		        	<div class="hover-shadow"></div>
		        	<span class="show-year">{{ $s->releaseYear }}</span>
		            <img class="img-fluid" src="{{ $s->posterPath }}">

		            <div class="ratingBlock">
			            <div class="ratingList">
			                <span class="fa fa-star checked"></span>
			                <span class="fa fa-star checked"></span>
			                <span class="fa fa-star checked"></span>
			                <span class="fa fa-star checked"></span>
			                <span class="fa fa-star"></span>
			            </div>
		        	</div>
		        </div>
		        <p class="textBlock text-center col-lg-12"><a href="show/{{ $s->id }}">{{ $s->title }}</a></p>
		    </div>
	    @endforeach
	</div>
</div>
@endsection