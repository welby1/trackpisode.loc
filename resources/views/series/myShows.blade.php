@extends('layouts.master')
@section('content')
	<div class="row col-lg-10 tabBlock">
		<span class="activeTabButton">Watching</span>
		<span>Planning</span>
		<span>Seen</span>
	</div>

	<div class="row col-lg-10 table-responsive m-0 p-0">
		<table cellpadding="0" cellspacing="0" width="100%" class="table myshows-list">
		    	<tr class="d-flex">
			    	<td class="col-5">Title</td>
			    	<td class="col-1">Year</td>
			    	<td class="col-2">Status</td>
			    	<td class="col-4">Progress</td>
		    	</tr>
				<tr class="d-flex">
					<td class="col-5">Rick and Morty</td>
					<td class="col-1">2010</td>
					<td class="col-2">Running</td>
					<td class="col-4">
						<div class="showProgress">
							<span style="min-width: 35.48%" class="_name">Seen Episodes</span>
							<span style="width: 20%;" class="_line"></span>
							<span class="_done">10</span>
							<span class="_left">40</span>
						</div>
					</td>
				</tr>
				<tr class="d-flex">
					<td class="col-5">Banshee</td>
					<td class="col-1">2010</td>
					<td class="col-2">Running</td>
					<td class="col-4">
						<div class="showProgress">
							<span class="_name">Seen Episodes</span>
							<span style="width: 50%;" class="_line"></span>
							<span class="_done">25</span>
							<span class="_left">25</span>
						</div>
					</td>
				</tr>
		</table>
	</div>



<script>
	//repeating code.. todo:generalize
	$(document).ready(function(){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

		// Toggle Tab Buttons
		$(".tabBlock span").on("click", function(){

			$(this).not("activeTabButton").addClass("activeTabButton");
			$(this).prevAll().removeClass("activeTabButton");
			$(this).nextAll().removeClass("activeTabButton");
		});
	});
</script>
@endsection