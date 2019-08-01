@extends('layouts.master')
@section('content')

<div class="row justify-content-center">
  @if($errors->all())
    <div class="col-lg-8 alert alert-danger">
      @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
    </div>
  @endif
  
  <form class="col-lg-8" method="POST" id="form" action="{{ action('seriesController@addSeries') }}" enctype="multipart/form-data">
  	{{ csrf_field() }}
    <div class="form-group row">
  	<span id="success_message" class="alert alert-success col-lg-12 text-center" style="color:black;background-color: #39df7f; opacity:.6;position: absolute;z-index: 999;top:-30px;padding: 5px 0px 5px 0px;font-size: 1.2rem;border-radius: 0 0 50% 50%; display: none"><strong>Added Successfull</strong>
  	</span>
    </div>
    <div class="form-group row">
      <label for="title" class="col-lg-2 col-form-label">Title</label>
      <input type="text" class="form-control col-lg-10" id="title" name="title" placeholder="Title">
    </div>

    <div class="form-group row">
      <label for="releaseYear" class="col-lg-2 col-form-label">Release year</label>
      <input type="text" class="form-control col-lg-10" id="releaseYear" name="releaseYear" placeholder="Release year" maxlength="4" pattern="[0-9]+">
    </div>

    <div class="form-group row">
    	<div class="custom-file">
    		<label class="col-lg-2 col-form-label">Poster</label>
      	<input type="file" class="custom-file-input col-lg-6" id="posterPath" name="posterPath">
      	<label for="posterPath" class="custom-file-label col-lg-10 offset-lg-2">Choose Image</label>
      </div>
    </div>

    <div class="form-group row">
      <label for="genres" class="col-lg-2 col-form-label">Genre</label>
      <select id="genres" class="form-control col-lg-10" name="genres[]" multiple>
  	    @foreach($genres as $g)
      		<option value="{{$g->id}}">{{$g->name}}</option>
      	@endforeach
      </select>
    </div>

    <div class="form-group row">
      <label for="status" class="col-lg-2 col-form-label">Status</label>
      <select id="status" class="form-control col-lg-10" name="status" size="2">
        <option value="Running">Running</option>
        <option value="Ended">Ended</option>
      </select>
    </div>

    <div class="form-group row">
      <textarea class="form-control col-lg-12" name="summary" id="summary" rows="4" placeholder="Summary" style="resize: none;"></textarea>
    </div>

    <div class="form-group row">
    	<button type="submit" class="btn btn-lg col-lg-12" id="submit">Add</button>
    </div>
  </form>
</div>
<script>
	/*$("#submit").click(function(e) {
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