@extends('layouts.master')
@section('content')
	<div class="row col-lg-8">
		<h2 class="header">{{ $serie->title }}</h2>
	</div>
	
	<div class="row col-lg-8">
		<div class="title-block">
			<img class="img-fluid" src="{{ $serie->posterPath }}" style="width: 100%;height: 100%">
			<div class="overlay-pane"><div class="serie-rating-pane">6</div>
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
		</div>
		<div class="row details-pane">
			<div class="row col-lg-6">
				<p>Release: {{ $serie->releaseYear }}</p>
			</div>
			<div class="row col-lg-6">
				<p>Genre: 	@foreach ($genres as $genre)
								{{ $genre->name }}{{$loop->last ? '' : ', '}}
							@endforeach
				</p>
			</div>
		</div>	
	</div>

	<div class="row col-lg-8">
		<h2 class="header">Description</h2>
	</div>
	<div class="row col-lg-8 descr-pane">
		<p>{{ $serie->summary }}</p>
	</div>

@endsection