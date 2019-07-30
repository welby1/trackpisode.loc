@extends('layouts.master')
@section('content')
<div class="row col-lg-8">
	<h2 class="header" id="serie-Header" data-serieid="{{ $serie->id }}">{{ $serie->title }}</h2>
</div>

<div class="row col-lg-8">
	<div class="title-block">
		<img class="img-fluid" src="{{ $serie->posterPath }}" style="width: 100%;height: 100%">
		<div class="overlay-pane">
			<div class="serie-rating-pane" id="serie_rating" title="Voted {{$totalVoted}}">{{ $serieRating }}</div>
			<div class="ratingBlock">
	            <div class="ratingList">
	            	{{-- Add stars with '.checked' class if user voted already else add it without --}}
	            	@for ($k = 1; $k <= 10; $k++)
		            	@if(count($userVote))
		            		@if($k <= $userVote[0]['vote'])
		                		<span class="fa fa-star checked" data-value="{{$k}}" title="{{$k}}"></span>
		                	@else
		                		<span class="fa fa-star" data-value="{{$k}}" title="{{$k}}"></span>
		                	@endif
		                @else
		                	<span class="fa fa-star" data-value="{{$k}}" title="{{$k}}"></span>
		                @endif
	                @endfor
	            </div>
	        </div>
		</div>
	</div>

	<div class="row col-lg-12 statusBlockButtons">
		@if(count($serieStatus))
			<span class="col-lg-3 {{$serieStatus[0]['status'] == 'watching' ? 'activeStatusButton' : ''}}" data-status="watching">Watching</span>
			<span class="col-lg-3 {{$serieStatus[0]['status'] == 'seen' ? 'activeStatusButton' : ''}}" data-status="seen">Seen</span>
			<span class="col-lg-3 {{$serieStatus[0]['status'] == 'planning' ? 'activeStatusButton' : ''}}" data-status="planning">Planning</span>
			<span class="col-lg-3" data-status="not_watching">Not Watching</span>
		@else
			<span class="col-lg-3" data-status="watching">Watching</span>
			<span class="col-lg-3" data-status="seen">Seen</span>
			<span class="col-lg-3" data-status="planning">Planning</span>
			<span class="col-lg-3 activeStatusButton" data-status="not_watching">Not Watching</span>
		@endif
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
		<h2 class="header accordion">Season {{ $season->seasonNumber }}</h2>
	</div>

	<div class="row col-lg-8 table-responsive accordion-panel">
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
					<td class="episode-airdate">{{ date('d.m.Y', strtotime($episode->airdate)) }}</td>
					<td class="placeholder"></td>
				</tr>
				@endif
			@endforeach
			@php $i=1 @endphp
		</table>
	</div>
	@endforeach
@endif

<div class="row col-lg-8" style="margin-top: 35px;">
	<h2 class="header">Comments
		@if($totalComments > 0)<sup class="comment-counter">{{$totalComments}}</sup>@endif
	</h2>
</div>
<div class="row col-lg-8 mt-5">
	<textarea class="form-control" rows="3" name="comment_textarea" id="comment_textarea" placeholder="Comment..."></textarea>
	<button class="fx-sliderIn">COMMENT</button>
</div>
<div id="load-data">
@foreach($comments as $comment)
	<div class="row col-lg-8">
		<div class="col-lg-12 descr-pane comment-template">
			<h5>{{ $comment->name }}</h5>
			<p>{{ $comment->body }}</p>
			<span class="comment-time">{{date('d M Y H:i',strtotime($comment->created_at))}}</span>
		</div>
	</div>
@endforeach
@if(count($comments) >= 5)
	<div class="row col-lg-8" id="remove-row">
		<button id="btn-more" data-last-comment-id="{{ $comment->id }}" class="btn-block"><h5>More Comments</h5></button>
	</div>
@endif
</div>



<script>

	$(document).ready(function(){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		// Get value of data-serieid attribute
		var Serie_id = parseInt($("#serie-Header").attr("data-serieid"), 10);

		// Saving Serie Status
		$(".statusBlockButtons span").on("click", function(){
			
			// Prevent sending ajax requests on multiple clicking the same status button
			if(!$(this).hasClass("activeStatusButton")){
				var serieStatus = $(this).attr("data-status");
				$.ajax({
					url: '{{URL::to('status')}}',
					data: {_token: CSRF_TOKEN, serieStatus: serieStatus, Serie_id: Serie_id},
					type: 'post'
				});
			}

			$(this).not("activeStatusButton").addClass("activeStatusButton");
			$(this).prevAll().removeClass("activeStatusButton");
			$(this).nextAll().removeClass("activeStatusButton");
		});

		// Marking episodes 
		$(".haveseen-btn").on("click", function(){

			$(this).toggleClass("active-eye");

			//changing title attribute
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

		// Visualizing hover effect for rating stars
		$(".ratingList span").on("mouseover", function(){
			$(this).not(".checked").addClass("hover-star");
			$(this).prevAll().addClass("hover-star");
			$(".checked").removeClass("hover-star");
			$(this).nextAll().removeClass("hover-star");
		}).on("mouseout", function(){
			$(this).parent().children("span").removeClass("hover-star");
		});

		var operation = $(".ratingList span").hasClass("checked") ? "update" : "save";
		// Action to perform click
		$(".ratingList span").on("click", function(){
			// get vote value of clicked star
			var voteValue = parseInt($(this).data("value"), 10);
			$(this).addClass("checked");
			$(this).prevAll().addClass("checked");
			$(this).nextAll().removeClass("checked");

			$.ajax({
				url: '{{URL::to('save_vote')}}',
				data: { _token: CSRF_TOKEN, Serie_id: Serie_id, voteValue: voteValue, operation: operation },
				type: 'post',
				success: function(data){
					data = JSON.parse(data);
					$("#serie_rating").html(data.rating);
				}
			});
		});

		// Accordion for seasons
		$(".accordion").on("click", function(){
			$(this).toggleClass("active-accordion");

			if($(this).hasClass("active-accordion")){
				$(this).parent().next().fadeIn();
			} else {
				$(this).parent().next().fadeOut();
			}	
		});

		// Load more Comments on clicking button
		$(document).on('click', '#btn-more', function(){

       	var last_comment_id = $(this).data('last-comment-id');
       	$("#btn-more").html("<h5>Loading....</h5>");
	       
	       $.ajax({
	       		url : '{{ URL::to('comments/load/ajax') }}',
	           	method : "POST",
	           	data : { last_comment_id: last_comment_id, Serie_id: Serie_id, _token: CSRF_TOKEN },
	           	success : function (data){
	              	if(data != ''){
	                  	$('#remove-row').remove();
	                  	$('#load-data').append(data);
	                }
				}
			});
	   	});

		// Add Comment ajax
		$('.fx-sliderIn').on('click', function(){

			var getCommentText = $('#comment_textarea').val();

			$.ajax({
				url: '{{ URL::to('comment/add/ajax') }}',
				method: 'POST',
				data: { Serie_id: Serie_id, getCommentText: getCommentText, _token: CSRF_TOKEN },
				success: function(data){
					$('#comment_textarea').val('');
					$(data).hide().prependTo('#load-data').fadeIn('slow');
				}
			});

		});

		//


	});
</script>
@endsection