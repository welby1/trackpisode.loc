@extends('layouts.master')
@section('content')
<div class="row">
	<div class="row col-lg-12 filter-area">
		<div class="filter-title">FILTERS</div>
 		<div class="filter-box">
			<div class="selected-item" data-type="Year">Year</div>
			<ul class="list-item">
				<li style="display:none">Year</li>
				@foreach ($years as $year)
					<li data-value="{{ $year->releaseYear }}">{{ $year->releaseYear }}</li>
				@endforeach
			</ul>
		</div>
		<div class="filter-box">
			<div class="selected-item" data-type="Genre">Genre</div>
			<ul class="list-item">
				<li style="display:none">Genre</li>
				@foreach ($genres as $genre)
					<li data-value="{{ $genre->name }}">{{ $genre->name }}</li>
				@endforeach
			</ul>
		</div>
		<div class="filter-box">
			<div class="selected-item" data-type="Status">Status</div>
			<ul class="list-item">
				<li style="display:none">Status</li>
				@foreach ($statuses as $status)
					<li data-value="{{ $status->status }}">{{ $status->status }}</li>
				@endforeach
			</ul>
		</div>
		<div id="filterspinner"></div>
	</div>
	
	<div class="row customRowTopRated" data-total="{{ $total_count }}">
		@foreach ($series as $s)
			<div class="col-lg-4">
		        <div class="imgBlock rounded" onclick="document.location.href='show/{{ $s->id }}'">
		        	<div class="hover-shadow"></div>
		        	<span class="show-year">{{ $s->releaseYear }}</span>
		            <img class="img-fluid" src="{{ $s->posterPath }}">
		        </div>
		        <p class="textBlock text-center col-lg-12"><a href="show/{{ $s->id }}">{{ $s->title }}</a></p>
		    </div>
		@endforeach
	</div>
	<div class="col-lg-1 offset-6" id="dataspinner"></div>
</div>

<script>
	$(document).ready(function(){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		windowOnScroll();

		// show || hide dropdown
		$('.filter-box').each(function(index){
			var box_index = index;
			$(this).on('click', function(){
				$('.list-item').eq(box_index).toggle();
			});
		});

		$(document).on('click', function(event){
			// hide dropdown if clicking something that is not dropdown
			if($(event.target).attr('class') != 'selected-item' ){
				$('.list-item').css('display', 'none');
			}
			// hide previous clicked dropdown if clicking another dropdown
			$('.selected-item').each(function(){
				$(this).on('click', function(index){
					if($(this).eq(index) != index){
						$('.list-item').css('display', 'none');
					}
				});
			});		
		});

		// showing selected item; 
		$('.filter-box').each(function(index){
			var box_index = index;
			$(this).find('ul').find('li').each(function(){
				$(this).on('click', function(){
					var clicked_box = $('.filter-box').eq(box_index).find('.selected-item');
					var item_value = $(this).attr('data-value');
					clicked_box.html(item_value);

					// add / remove class to clicked dropdown item
					if($(this).hasClass('current')){
						$(this).removeClass('current');
						clicked_box.html($('.filter-box').eq(box_index).find('ul').find('li').eq(0).html());

						var selectedItems = getSelectedItems('.selected-item');
						getFilteredData(selectedItems);
					} else{
						$(this).addClass('current');
						$(this).prevAll().removeClass('current');
						$(this).nextAll().removeClass('current');

						var selectedItems = getSelectedItems('.selected-item');
						getFilteredData(selectedItems);
					}
				});
			});
		});

		function getSelectedItems(targetClass){
			var items = [];

			$.each($(targetClass), function(){
				if($(this).attr('data-type') != $(this).html()){
					items.push({type: $(this).attr('data-type'), selected: $(this).html()});
				}
			});

			return items;
		}

		function getFilteredData(value){
			$.ajax({
	       		url : '{{ URL::to('filter-data') }}',
	           	method : "POST",
	           	data : { selectedItems: JSON.stringify(value), _token: CSRF_TOKEN },
				beforeSend: function(){
					$('#filterspinner').html('<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>');
				},
	           	success : function (data){
					data = JSON.parse(data);
	              	if(data.total_count > 0){
						$('.customRowTopRated').empty();
						$('.customRowTopRated').append(data.output);
						$('.customRowTopRated').attr('data-total', data.total_count);
	                } else{
						$('.customRowTopRated').empty();
						$('.customRowTopRated').html('<div class="col-lg-12" id="empty"><p>No Data Found . . .</p></div>');
					}
					$('#filterspinner').empty();
				}
			});
		}

		function windowOnScroll(){
			$(window).on("scroll", function(e){
				if($(window).scrollTop() == $(document).height() - $(window).height()){
					var box = $('.customRowTopRated');
					if(box.children().length < box.attr('data-total')) {
						var lastItemId = $('.textBlock a:last').attr('href').replace('show/','');

						var selectedItems = getSelectedItems('.selected-item');
						getMoreData(lastItemId, selectedItems);
					}
				}
			});
		}

		function getMoreData(lastItemId, selectedItems){
			$(window).off("scroll");
			$.ajax({
				url: '{{ URL::to('get-more-data') }}',
				method: 'POST',
				data: { lastItemId: lastItemId, selectedItems: JSON.stringify(selectedItems), _token: CSRF_TOKEN },
				beforeSend: function(){
					$('#dataspinner').html('<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>');
				},
				success: function (data) {
					data = JSON.parse(data);
					setTimeout(function() {
						$('#dataspinner').empty();
						$(".customRowTopRated").append(data.output);
						windowOnScroll();
					}, 500);
				}
			});
		}
	});

</script>



@endsection

