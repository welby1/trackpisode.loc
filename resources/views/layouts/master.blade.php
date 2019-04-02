<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <style>
      .customNavStyle {
        background-color: #6B6E70;
      }
      .nav-link {
        color: var(--mainGreenColor) !important;
      }
      #navbarNav ul li .active {
        border-bottom: solid 1px var(--mainGreenColor);
      }
      .imgBlock{
        box-shadow: 0 15px 10px -10px rgba(0,0,0,0.5);
        position:relative;
        height: 160px;
        overflow: hidden;
      }
      .imgBlock:hover img{
        transform: scale3d(1.2, 1.2, 1);
        transition: all .3s linear;
      }
      .imgBlock img {
        transition: all .3s linear;
        transform: scale3d(1, 1, 1);
      }
      .imgBlock:hover > .hover-shadow{
        width:100%;
        height:100%;
        position:absolute;
        background-color:#000;
        opacity:0.4;
        z-index: 99;
        transition: all .3s linear;
      }
      .show-year{
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 99;
        color: #222;
        padding: 0 6px;
        line-height: 25px;
        height: 25px;
        font-weight: 600;
        font-size: 13px;
        background-color: rgba(255, 235, 59, 0.8);
      }
      .ratingBlock {
        height: 35px;
        position: absolute;
        z-index: 99;
        bottom: -7px;
        left: 10px;
      }
      .textBlock {
        height: 50px;
        margin: 0;
        font-size: 1.6em;
      }
    </style>
  </head>

  <body>
    @include('layouts.header')

    <div class="container" style="margin-top: 80px;">
        <div class="row justify-content-center">
            @yield('content')
        </div>
    </div>

    @include('layouts.footer')
  </body>
</html>