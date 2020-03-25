<?php
//dump($seasons);
?>

@extends('layouts.master')
@section('content')
<div class="row">
	<div class="row customRowTopRated2">
		@foreach ($series as $s)
			<div class="col-lg-3" data-unmarked="{{ $s->unmarkedEpisodes }}">
		        <div class="imgBlock rounded" onclick="document.location.href='show/{{ $s->id }}'">
		        	<div class="hover-shadow"></div>
		            <img class="img-fluid" src="{{ $s->posterPath }}">
		        </div>
		        <p class="textBlock text-center col-lg-12"><a href="show/{{ $s->id }}">{{ $s->title }}</a></p>
		    </div>
			<div class="col-lg-12"></div>

			@if(count($seasons))
				@foreach ($seasons as $season)
				@if($season->Serie_id == $s->id)
				<div class="row col-lg-8">
					<h2 class="header accordion">Season {{ $season->seasonNumber }}</h2>
				</div>

				<div class="row col-lg-8 table-responsive accordion-panel">
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
				<div class="col-lg-12"></div>
				@endif
				@endforeach
			@endif
		@endforeach
	</div>
</div>

<script>

	$(document).ready(function(){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		{{-- Get value of data-serieid attribute --}}
		var Serie_id = parseInt($("#serie-Header").attr("data-serieid"), 10);

		{{-- Saving Serie Status --}}
		$(".statusBlockButtons span").on("click", function(){
			
			{{-- Prevent sending ajax requests on multiple clicking the same status button --}}
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

		{{-- Visualizing hover effect for rating stars --}}
		$(".ratingList span").on("mouseover", function(){
			$(this).not(".checked").addClass("hover-star");
			$(this).prevAll().addClass("hover-star");
			$(".checked").removeClass("hover-star");
			$(this).nextAll().removeClass("hover-star");
		}).on("mouseout", function(){
			$(this).parent().children("span").removeClass("hover-star");
		});

		var operation = $(".ratingList span").hasClass("checked") ? "update" : "save";
		{{-- Action to perform click --}}
		$(".ratingList span").on("click", function(){
			{{-- get vote value of clicked star --}}
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

		{{-- Accordion for seasons --}}
		$(".accordion").on("click", function(){
			$(this).toggleClass("active-accordion");

			if($(this).hasClass("active-accordion")){
				$(this).parent().next().fadeIn();
			} else {
				$(this).parent().next().fadeOut();
			}	
		});

		{{-- Load more Comments on clicking button --}}
		$(document).on('click', '#btn-more', function(){

       	var last_comment_id = $(this).data('last-comment-id');
       	$("#btn-more").html('<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw" style="font-size:1.75rem"></i>');
	       
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

		{{-- Add Comment ajax --}}
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



	});
</script>

@endsection