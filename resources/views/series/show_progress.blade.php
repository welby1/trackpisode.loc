@extends('layouts.master')
@section('content')
<div class="row col-lg-12">
	<aside class="col-lg-9">
		<div class="row m-0">
			<img src="/svg/schedule.svg" height="32px" width="32px">
			<h4 class="header_progress">New episodes <sup class="item-counter"><span class="badge badge-pill badge-secondary">{{$episodes->count()}}</span></sup></h4>
		</div>
		<div class="row customRowTopRated2">

			@foreach ($series as $s)
				<div class="row col-lg-12" style="padding: 15px">
					<div class="col-lg-5">
				        <div class="imgBlock rounded" onclick="document.location.href='show/{{ $s->id }}'">
				        	<div class="hover-shadow"></div>
				            <img class="img-fluid" src="{{ $s->posterPath }}">
				        </div>  
				    </div>
				    <div class="infoBlock col-lg-7">
				    	<p class="textBlock col-lg-12"><a href="show/{{ $s->id }}">{{ $s->title }}</a>
							@if( $s->status == 'Running')
								<sup><span class="badge badge-success">ON AIR</span></sup>
							@else
								<sup><span class="badge badge-danger">DEAD</span></sup>
							@endif
						</p>
				    	<p class="textBlock2 col-lg-12">Unwatched episodes: <span>{{$s->unmarkedEpisodes}}</span></p>
				    </div>
				</div>
				
				@if(count($seasons))
					@foreach ($seasons as $season)
					@if($season->Serie_id == $s->id)
					<div class="row col-lg-12">
						<h2 class="header accordion" data-spoilerid="{{$s->id}}_{{$season->seasonNumber}}">Season {{ $season->seasonNumber }}</h2>
					</div>

					<div class="row col-lg-12 table-responsive accordion-panel">
						<table cellpadding="0" cellspacing="0" width="100%" class="table seasons-list">
							@foreach ($episodes as $episode)
								{{-- check to show episodes for corresponding seasons --}}
								@if (($season->seasonNumber == $episode->seasonNumber) && $episode->id == $s->id)
								<tr>
									<td class="placeholder"></td>
									<td class="haveseen-area">
										<div class="haveseen-btn" title="Mark as watched episode" data-episodeid="{{ $episode->episode_id }}"></div>
									</td>
									<td class="episode-number">{{ $episode->seasonNumber }}x{{ $episode->ep_number }}</td>
									<td class="episode-title">{{ $episode->episode_title }}</td>
									<td class="episode-airdate">{{ date('d.m.Y', strtotime($episode->airdate)) }}</td>
									<td class="placeholder"></td>
								</tr>
								@endif
							@endforeach
						</table>
					</div>
					@endif
					@endforeach
				@endif
			@endforeach
		</div>
	</aside>

	<aside class="watching_col col-lg-3">
		<div class="row col-12">
			<img src="/svg/watch-table-eye.svg" height="32px" width="32px">
			<h4>Watching <sup class="item-counter"><span class="badge badge-pill badge-secondary">{{$watching->count()}}</span></sup></h4>
		</div>
		<ul>
			@foreach ($watching as $s)
			<li><a href="show/{{ $s->id }}">{{ $s->title }}</a></li>
			@endforeach
		</ul>
	</aside>
</div>

<script>

	function getCookie(name) {
	  let matches = document.cookie.match(new RegExp(
	    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
	  ));
	  return matches ? decodeURIComponent(matches[1]).split(',') : undefined;
	}

	$(document).ready(function(){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		{{-- Get value of data-serieid attribute --}}


		{{-- Marking episodes --}}
		$(".haveseen-btn").on("click", function(){

			$(this).toggleClass("active-eye");

			{{-- changing title attribute --}}
			if($(this).hasClass("active-eye")){
				$(this).attr("title", "Mark as unwatched episode");
			} else{
				$(this).attr("title", "Mark as watched episode");
			}

			var episode_id = $(this).attr("data-episodeid");

			var isActive = $(this).hasClass("active-eye") ? "save" : "delete";

			$.ajax({
				url: '{{URL::to('mark_episode')}}',
				data: { _token: CSRF_TOKEN, episode_id: episode_id, isActive: isActive },
				type: 'post'
			});
		});


		{{-- Accordion for seasons --}}
		$(".accordion").on("click", function(){
			$(this).toggleClass("active-accordion");

			let spoiler_id = $(this).attr("data-spoilerid");

			if($(this).hasClass("active-accordion")){
				$(this).parent().next().fadeIn();
			} else {
				$(this).parent().next().fadeOut();
			}

			let active = $(this).hasClass("active-accordion") ? 1 : 0;

			$.ajax({
				url: '{{URL::to('cookie-spoilers')}}',
				data: { _token: CSRF_TOKEN, spoiler_id: spoiler_id, active: active },
				type: 'post'
			});

		});

		{{-- open spoilers that are in cookie when reloading page --}}
		let cookieValues = getCookie('spoilers');

   		if( typeof cookieValues != 'undefined' ){
   			cookieValues.forEach(function(value){
	   			$(".accordion").each(function( index ) {
		   			if($(this).attr("data-spoilerid") == value){
		   				$(this).addClass("active-accordion");
		   				$(this).parent().next().fadeIn();
		   			}
	   			})
	   		})
   		}

	});

</script>

@endsection