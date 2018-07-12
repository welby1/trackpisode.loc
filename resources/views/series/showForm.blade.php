@extends('layouts.master')
@section('content')

<form class="col-lg-8" method="POST" id="form" action="{{ action('seriesController@addSeries') }}">
	{{ csrf_field() }}
  <div class="form-group row">
    <label for="title" class="col-lg-2 col-form-label">Title</label>
    <input type="text" class="form-control col-lg-5" id="title" name="title" placeholder="Title">
  </div>

  <div class="form-group row">
    <label for="releaseYear" class="col-lg-2 col-form-label">Release year</label>
    <input type="text" class="form-control col-lg-5" id="releaseYear" name="releaseYear" placeholder="Release year">
  </div>

  <div class="form-group row">
    <label for="genres" class="col-lg-2 col-form-label">Genre</label>
    <select id="genres" class="form-control col-lg-5" name="genres">
	    @foreach($genres as $g)
    		<option value="{{$g->id}}">{{$g->name}}</option>
    	@endforeach
    </select>
  </div>

  <div class="form-group row">
    <textarea class="form-control" name="summary" id="summary" rows="3" placeholder="Summary"></textarea>
  </div>

  <div class="form-group row">
  	<button type="submit" class="btn btn-primary" id="submit" style="margin-right: 20px;">Add</button>
  	<span id="error_message" class="alert alert-danger" style="padding:6px;margin:0;display:none"></span>
  	<span id="success_message" class="alert alert-success" style="padding:6px;margin:0;display:none"></span>
  </div>
</form>

<script>
	$("#form").submit(function(e) {
	e.preventDefault();
	var title = $('#title').val();
	var releaseYear = $('#releaseYear').val();
	var genre = $('#genres').val();
	var summary = $('#summary').val();
	
	if(title=='' || releaseYear=='' || genre=='' || summary=='') {
		$("#error_message").show().html("All Fields are Required");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "seriesController.php",
			data: "title="+title+"&releaseYear="+releaseYear+"&genre="+genre+"&summary="+summary,
			success: function(data){
				$('#success_message').fadeIn().html(data);
				setTimeout(function() {
					$('#success_message').fadeOut("slow");
				}, 2000 );

			}
		});
	}
})
</script>
@endsection