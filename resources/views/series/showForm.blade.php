@extends('layouts.master')
@section('content')
<form class="col-lg-8" method="POST" id="form" action="{{ action('seriesController@addSeries') }}">
	{{ csrf_field() }}
  <div class="form-group row">
	<span id="success_message" class="alert alert-success col-lg-12 text-center" style="color:black;background-color: #39df7f; opacity:.6;position: absolute;z-index: 999;top:-30px;padding: 5px 0px 5px 0px;font-size: 1.2rem;border-radius: 0 0 50% 50%; display: none"><strong>Added Successfull</strong>
	</span>
  </div>
  <div class="form-group row">
    <label for="title" class="col-lg-2 col-form-label">Title</label>
    <input type="text" class="form-control col-lg-10" id="title" name="title" placeholder="Title" required>
  </div>

  <div class="form-group row">
    <label for="releaseYear" class="col-lg-2 col-form-label">Release year</label>
    <input type="text" class="form-control col-lg-10" id="releaseYear" name="releaseYear" placeholder="Release year" required>
  </div>

  <div class="form-group row">
    <label for="genres" class="col-lg-2 col-form-label">Genre</label>
    <select id="genres" class="form-control col-lg-10" name="genres[]" required multiple>
	    @foreach($genres as $g)
    		<option value="{{$g->id}}">{{$g->name}}</option>
    	@endforeach
    </select>
  </div>

  <div class="form-group row">
    <textarea class="form-control col-lg-12" name="summary" id="summary" rows="4" placeholder="Summary" required></textarea>
  </div>

  <div class="form-group row">
  	<button type="submit" class="btn btn-lg col-lg-12" id="submit">Add</button>
  </div>
</form>
<script>
	$("#submit").click(function(e) {
		e.preventDefault();
		var title = $('#title').val();
		var releaseYear = $('#releaseYear').val();
		var genre = $('#genres').val();
		var summary = $('#summary').val();
		
		if(title != '' && releaseYear != '' && genre !='' && summary != '') {
			$('#success_message').fadeIn();
			setTimeout(function() {
				$('#success_message').fadeOut("slow");
				$("#submit").unbind('click').click();  //unbind event e.preventDefault() on buttonclick
			}, 500 );		
		}
	});
</script>
@endsection