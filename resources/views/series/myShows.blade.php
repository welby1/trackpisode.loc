@extends('layouts.master')
@section('content')
	<div class="row col-lg-10 tabBlock">
		<span class="activeTabButton"">Watching</span>
		<span>Planning</span>
		<span>Seen</span>
	</div>

	<div class="row col-lg-10 table-responsive m-0 p-0 tabContent activeTabContent">
		<table cellpadding="0" cellspacing="0" width="100%" class="table myshows-list">
		    	<tr class="d-flex">
			    	<td class="col-5">Title</td>
			    	<td class="col-1">Year</td>
			    	<td class="col-2">Status</td>
			    	<td class="col-4">Progress</td>
		    	</tr>
		    	@if(count($series))
			    	@foreach($series as $serie)
				    	@if($serie->UserStatus == "watching")
							<tr class="d-flex">
								<td class="col-5">{{ $serie->title }}</td>
								<td class="col-1">{{ $serie->releaseYear }}</td>
								<td class="col-2">{{ $serie->status }}</td>
								<td class="col-4">
									<div class="showProgress">
										<span class="_name">Seen Episodes</span>
										@foreach($userEpisodes as $ue)
											@foreach($serieEpisodes as $se)
												@if($se->id == $serie->id && $se->id == $ue->id)
													<span style="width: {{ number_format(($ue->markedEpisodesNumber * 100) / $se->totalSerieEpisodes, 2) }}%" class="_line"></span>
												@endif
											@endforeach
										@endforeach
										<span class="_done" title="Seen">
											@foreach($userEpisodes as $ue)
												@if($ue->id == $serie->id)
													{{ $ue->markedEpisodesNumber }}
												@endif
											@endforeach
										</span>
										<span class="_left" title="Left">
											@foreach($userEpisodes as $ue)
												@foreach($serieEpisodes as $se)
													@if($se->id == $serie->id && $se->id == $ue->id)
														{{ $se->totalSerieEpisodes - $ue->markedEpisodesNumber }}
													@endif
												@endforeach
											@endforeach
										</span>
									</div>
								</td>
							</tr>
						@endif
					@endforeach
				@endif
		</table>
	</div>

	<div class="row col-lg-10 table-responsive m-0 p-0 tabContent">
		<table cellpadding="0" cellspacing="0" width="100%" class="table myshows-list">
		    	<tr class="d-flex">
			    	<td class="col-5">Title</td>
			    	<td class="col-1">Year</td>
			    	<td class="col-2">Status</td>
			    	<td class="col-4">Progress</td>
		    	</tr>
				@if(count($series))
			    	@foreach($series as $serie)
				    	@if($serie->UserStatus == "planning")
							<tr class="d-flex">
								<td class="col-5">{{ $serie->title }}</td>
								<td class="col-1">{{ $serie->releaseYear }}</td>
								<td class="col-2">{{ $serie->status }}</td>
								<td class="col-4">
									<div class="showProgress">
										<span class="_name">Seen Episodes</span>
										@foreach($userEpisodes as $ue)
											@foreach($serieEpisodes as $se)
												@if($se->id == $serie->id && $se->id == $ue->id)
													<span style="width: {{ number_format(($ue->markedEpisodesNumber * 100) / $se->totalSerieEpisodes, 2) }}%" class="_line"></span>
												@endif
											@endforeach
										@endforeach
										<span class="_done" title="Seen">
											@foreach($userEpisodes as $ue)
												@if($ue->id == $serie->id)
													{{ $ue->markedEpisodesNumber }}
												@endif
											@endforeach
										</span>
										<span class="_left" title="Left">
											@foreach($userEpisodes as $ue)
												@foreach($serieEpisodes as $se)
													@if($se->id == $serie->id && $se->id == $ue->id)
														{{ $se->totalSerieEpisodes - $ue->markedEpisodesNumber }}
													@endif
												@endforeach
											@endforeach
										</span>
									</div>
								</td>
							</tr>
						@endif
					@endforeach
				@endif
		</table>
	</div>

	<div class="row col-lg-10 table-responsive m-0 p-0 tabContent">
		<table cellpadding="0" cellspacing="0" width="100%" class="table myshows-list">
		    	<tr class="d-flex">
			    	<td class="col-5">Title</td>
			    	<td class="col-1">Year</td>
			    	<td class="col-2">Status</td>
			    	<td class="col-4">Progress</td>
		    	</tr>
				@if(count($series))
			    	@foreach($series as $serie)
				    	@if($serie->UserStatus == "seen")
							<tr class="d-flex">
								<td class="col-5">{{ $serie->title }}</td>
								<td class="col-1">{{ $serie->releaseYear }}</td>
								<td class="col-2">{{ $serie->status }}</td>
								<td class="col-4">
									<div class="showProgress">
										<span class="_name">Seen Episodes</span>
										@foreach($userEpisodes as $ue)
											@foreach($serieEpisodes as $se)
												@if($se->id == $serie->id && $se->id == $ue->id)
													<span style="width: {{ number_format(($ue->markedEpisodesNumber * 100) / $se->totalSerieEpisodes, 2) }}%" class="_line"></span>
												@endif
											@endforeach
										@endforeach
										<span class="_done" title="Seen">
											@foreach($userEpisodes as $ue)
												@if($ue->id == $serie->id)
													{{ $ue->markedEpisodesNumber }}
												@endif
											@endforeach
										</span>
										<span class="_left" title="Left">
											@foreach($userEpisodes as $ue)
												@foreach($serieEpisodes as $se)
													@if($se->id == $serie->id && $se->id == $ue->id)
														{{ $se->totalSerieEpisodes - $ue->markedEpisodesNumber }}
													@endif
												@endforeach
											@endforeach
										</span>
									</div>
								</td>
							</tr>
						@endif
					@endforeach
				@endif
		</table>
	</div>



<script>
	$(document).ready(function(){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

		// Toggle Tab Buttons and Tab Content
		$(".tabBlock span").on("click", function(){
			
			if(!$(this).hasClass("activeTabButton")){

				$(this).not("activeTabButton").addClass("activeTabButton");
				$(this).prevAll().removeClass("activeTabButton");
				$(this).nextAll().removeClass("activeTabButton");
				$(".tabContent").removeClass("activeTabContent").eq($(this).index()).addClass("activeTabContent");
			}
		});
	});
</script>
@endsection