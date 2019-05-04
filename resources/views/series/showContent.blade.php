@extends('layouts.master')
@section('content')
<div class="row col-lg-8">
	<h2 class="header" data-serieid="{{ $serie->id }}">{{ $serie->title }}</h2>
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
{{-- checking if current serie got seasons --}}
@if(count($seasons))
	@foreach ($seasons as $season)
	<div class="row col-lg-8">
		<h2 class="header">Season {{ $season->seasonNumber }}</h2>
	</div>

	<div class="row col-lg-8 table-responsive">
		<table cellpadding="0" cellspacing="0" width="100%" class="table seasons-list">
			@foreach ($episodes as $episode)
				{{-- check to show episodes for corresponding seasons --}}
				@if ($loop->parent->iteration == $episode->seasonNumber)
				<tr>
					<td class="placeholder"></td>
					<td class="haveseen-area">
					{{-- IF current user got marked episodes THEN show marked and unmarked ELSE show unmarked only --}}
					@if(count($markedEpisodes))
						@foreach ($markedEpisodes as $markedEpisode)
							@if ($markedEpisode->Episode_id == $episode->id)	
							<div class="haveseen-btn active-eye" title="Mark as unwatched episode" data-episodeid="{{ $episode->id }}"></div>
							@break
							@endif
						@endforeach
						@if($markedEpisode->Episode_id != $episode->id)
							<div class="haveseen-btn" title="Mark as watched episode" data-episodeid="{{ $episode->id }}"></div>
						@endif
					@else
						<div class="haveseen-btn" title="Mark as watched episode" data-episodeid="{{ $episode->id }}"></div>
					@endif
					</td>
					<td class="episode-number">{{ $loop->parent->iteration }}x{{ $i++ }}</td>
					<td class="episode-title">{{ $episode->title }}</td>
					<td class="episode-airdate">{{ $episode->airdate }}</td>
					<td class="placeholder"></td>
				</tr>
				@endif
			@endforeach
			@php $i=1 @endphp
		</table>
	</div>
	@endforeach
	<div id="res"></div>
@endif
<script>

	$(document).ready(function(){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

		$(".haveseen-btn").on("click", function(){

			$(this).toggleClass("active-eye");

			//changing title attribute
			if($(this).hasClass("active-eye")){
				$(this).attr("title", "Mark as unwatched episode");
			} else{
				$(this).attr("title", "Mark as watched episode");
			}

			var episode_id = $(this).attr("data-episodeid");

			//var isActive = false;
			var isActive = $(this).hasClass("active-eye") ? "save" : "delete";

			$.ajax({
				url: '{{URL::to('mark_episode')}}',
				data: { _token: CSRF_TOKEN, episode_id: episode_id, isActive: isActive },
				type: 'post',
				success: function(data){
					$("#res").html(data);
				}
			});
		});
	});
</script>
@endsection