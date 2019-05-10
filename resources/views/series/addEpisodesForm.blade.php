@extends('layouts.master')
@section('content')

<div class="row justify-content-center">

  <form class="col-lg-8" method="POST" id="form" action="{{ action('seriesController@addEpisodes') }}">
    {{ csrf_field() }}
    <div class="form-group row">
    <span id="success_message" class="alert alert-success col-lg-12 text-center" style="color:black;background-color: #39df7f; opacity:.6;position: absolute;z-index: 999;top:-30px;padding: 5px 0px 5px 0px;font-size: 1.2rem;border-radius: 0 0 50% 50%; display: none"><strong>Added Successfull</strong>
    </span>
    </div>
    <div class="form-group row">
      <label for="searchSerie" class="col-lg-2 col-form-label">Serie</label>
      <input type="text" class="form-control col-lg-10" id="searchSerie" placeholder="Title" autocomplete="off" name="searchSerie" autofocus>
      <div class="offset-lg-2 col-lg-10" id="droparea">
        <ul id="droplist"></ul>
      </div>
    </div>
    <div class="form-group row">
      <label for="seasons" class="col-lg-2 col-form-label">Seasons</label>
      <select id="seasons" class="form-control col-lg-10" name="seasons">
        <option value="">Select serie first</option>
      </select>
    </div>
    <div class="form-group row">
      <label for="episodeTitle" class="col-lg-2 col-form-label">Episode</label>
      <input type="text" class="form-control col-lg-10" id="episodeTitle" placeholder="Title" name="episodeTitle">
    </div>
    <div class="form-group row">
      <label for="airdate" class="col-lg-2 col-form-label">Airdate</label>
      <input type="text" class="form-control col-lg-10" id="airdate" placeholder="YYYY-MM-DD" name="airdate">
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
*/

  
  $(document).ready(function(){

    //send input value to the route '/search_serie' which calls controller's method 'loadSeries_ajax'
    $("#searchSerie").keyup(function(){
      var searchSerie = $("#searchSerie").val();
      if(searchSerie != ""){
        $.ajax({
          url: '{{URL::to('search_serie')}}',
          data: { 'searchSerie': searchSerie },
          type: 'get',
          success: function(data){
            $("#droplist").html(data);
            $("#droparea").fadeIn();
          }
        });
      } else{
        $("#seasons").html('<option value="">Select serie first</option>');
        $("#droparea").fadeOut();
      }
    });

    //hide list elements
    $("#searchSerie").blur(function(){
      $("#droparea").fadeOut();
    });

    //show list elements
    $("#searchSerie").focus(function(){
      if(searchSerie != ""){
        $("#droparea").fadeIn();
      } else{
        $("#droparea").fadeOut();
      }
    });

    //set value for input & get value of 'data-id' attribute
    $("#droplist").on("click", "li", function(){
      var getSerie_id = $(this).attr("data-id");
      var getText = $(this).text();
      $("#searchSerie").val(getText);
      //after clicking on suggestion 'li' when focus input again will be this suggestion or some like this
      $.ajax({
          url: '{{URL::to('search_serie')}}',
          data: { 'searchSerie': getText },
          type: 'get',
          success: function(data){
            $("#droplist").html(data);
          }
      });

      //after click on suggestion list item  load seasons for the item  
      if(getSerie_id != ""){
        $.ajax({
          url: '{{URL::to('load_seasons')}}',
          data: {'getSerie_id': getSerie_id},
          type: 'get',
          success: function(data){
            $("#seasons").html(data);
          }
        });
      } else{
        $("#seasons").html("<option value=''>Select serie first</option>");
      }
    });

  });
</script>
@endsection