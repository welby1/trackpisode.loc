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
          <a class="nav-link" href="{{ route('add_series_route') }}">Add Series</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('add_seasons_route') }}">Add Season</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('shows_route') }}">Shows</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">item</a>
        </li>
      </ul>
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
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