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
								<td class="col-5"><a href="show/{{ $serie->id }}">{{ $serie->title }}</a></td>
								<td class="col-1">{{ $serie->releaseYear }}</td>
								<td class="col-2">
									@if( $serie->status == 'Running')
										<sup><span class="badge badge-success">ON AIR</span></sup>
									@else
										<sup><span class="badge badge-danger">DEAD</span></sup>
									@endif
								</td>
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
								<td class="col-5"><a href="show/{{ $serie->id }}">{{ $serie->title }}</a></td>
								<td class="col-1">{{ $serie->releaseYear }}</td>
								<td class="col-2">
									@if( $serie->status == 'Running')
										<sup><span class="badge badge-success">ON AIR</span></sup>
									@else
										<sup><span class="badge badge-danger">DEAD</span></sup>
									@endif
								</td>
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
								<td class="col-5"><a href="show/{{ $serie->id }}">{{ $serie->title }}</a></td>
								<td class="col-1">{{ $serie->releaseYear }}</td>
								<td class="col-2">
									@if( $serie->status == 'Running')
										<sup><span class="badge badge-success">ON AIR</span></sup>
									@else
										<sup><span class="badge badge-danger">DEAD</span></sup>
									@endif
								</td>
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

		//-> Sorting Table
		$('.myshows-list').each(function(index){
			var tableIndex = index;
			$(this).find('tr').eq(0).find('td').each(function(){
				$(this).on('click', function(){

					var table = $('table').eq(tableIndex);
					var rows = table.find('tr').not(':eq(0)').toArray().sort(comparer($(this).index()));
					this.asc = !this.asc;
					if(this.asc){rows = rows.reverse()}
					for (var i = 0; i < rows.length; i++){table.append(rows[i])}
				});
			});
		});
		function comparer(index){
			return function(a, b){
				var valA = getCellValue(a, index), valB = getCellValue(b, index)
				return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
			}
		}
		function getCellValue(row, index){
			return $(row).children('td').eq(index).text()
		}
		//<- Sorting Table


	});

</script>
@endsection