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

  @isset($seasonExistsError)
    <div class="col-lg-8 alert alert-danger"><li>{{ $seasonExistsError }}</li></div>
  @endisset
  
  <form class="col-lg-8" method="POST" id="form" action="{{ action('seriesController@addSeasons') }}">
    {{ csrf_field() }}
    <div class="form-group row">
    <span id="success_message" class="alert alert-success col-lg-12 text-center" style="color:black;background-color: #39df7f; opacity:.6;position: absolute;z-index: 999;top:-30px;padding: 5px 0px 5px 0px;font-size: 1.2rem;border-radius: 0 0 50% 50%; display: none"><strong>Added Successfull</strong>
    </span>
    </div>
    <div class="form-group row">
      <label for="series" class="col-lg-2 col-form-label">Series</label>
      <select id="series" class="form-control col-lg-10" name="series">
        @foreach($series as $serie)
          <option value="{{$serie->id}}">{{$serie->title}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group row">
      <label for="seasonNumber" class="col-lg-2 col-form-label">Season</label>
      <input type="text" class="form-control col-lg-10" id="seasonNumber" name="seasonNumber" placeholder="Season number" maxlength="3">
    </div>

    <div class="form-group row">
      <button type="submit" class="btn btn-lg col-lg-12" id="submit">Add</button>
    </div>
  </form>
</div>
<script>
  /*$("#submit").click(function(e) {
    e.preventDefault();
    var series = $('#series').val();
    var seasonNumber = $('#seasonNumber').val();
    
    
    if(series != '' && seasonNumber != '') {
      $('#success_message').fadeIn();
      setTimeout(function() {
        $('#success_message').fadeOut("slow");
        $("#submit").unbind('click').click();  //unbind event e.preventDefault() on buttonclick
      }, 500 );   
    }
  });
</script>
@endsection