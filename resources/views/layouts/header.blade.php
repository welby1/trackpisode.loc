<header>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">TRACKPISODE</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('add_series_route') }}">Add Serie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('add_seasons_route') }}">Add Season</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('add_episodes_route') }}">Add Episode</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('shows_route') }}">Shows</a>
        </li>
      </ul>
      <form class="form-inline col-lg-5" style="padding: 0">
        <input class="form-control col-lg-12" style="padding-right: 17%" type="text" id="headerSearch" name="headerSearch" placeholder="Search" aria-label="Search" autocomplete="off">
        <button class="btn btn-outline-success offset-lg-10 col-lg-2" style="position: absolute" type="submit"><span class="fa fa-search"></span></button>
        <div class="col-lg-12" id="header-droparea">
          <ul id="header-droplist">
          </ul>
        </div>
      </form>
    </div>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
      </ul>
    </div>
  </nav>
</header>
<script>
  //change .active class to navbar element
  $(function(){
    var pageURL = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
    $("#navbarNav ul li a").each(function(){
      var currentElement = $(this).attr("href").substr($(this).attr("href").lastIndexOf("/")+1);
      if(currentElement == pageURL){
        $(this).addClass("active");
      }
    });
   });
</script>
<script>
  $(document).ready(function(){
    var searchHeaderSerie;
    //send input value to the route '/search_serie' which calls controller's method 'loadSeries_ajax'
    $("#headerSearch").keyup(function(){
      searchHeaderSerie = $("#headerSearch").val();
      if(searchHeaderSerie != ""){
        $.ajax({
          url: '{{URL::to('search_serie')}}',
          data: { 'searchHeaderSerie': searchHeaderSerie },
          type: 'get',
          success: function(data){
            $("#header-droplist").html(data);
            $("#header-droparea").fadeIn();
          }
        });
      } else{
        $("#header-droparea").fadeOut();
      }
    });

    //hide list elements
    $("#headerSearch").blur(function(){
      $("#header-droparea").fadeOut();
    });

    //show list elements
    $("#headerSearch").focus(function(){
      if(searchHeaderSerie != ""){
        $("#header-droparea").fadeIn();
      } else{
        $("#header-droparea").fadeOut();
      }
    });

    //set value for input & get value of 'data-id' attribute
    $("#header-droplist").on("click", "li", function(){
      var getSerie_id = $(this).attr("data-id");
      var getText = $(this).text();
      $("#headerSearch").val(getText);
      //after clicking on suggestion 'li' when focus input again will be this suggestion or some like this
      $.ajax({
          url: '{{URL::to('search_serie')}}',
          data: { 'searchHeaderSerie': getText },
          type: 'get',
          success: function(data){
            $("#header-droplist").html(data);
          }
      });
    });

  });
</script>