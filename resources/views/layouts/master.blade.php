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
      :root {
        --mainGreenColor: #00d254;
      }
      /* remove outline from pagination */
      .page-link:focus,.page-link:active {
        outline: none !important;
        box-shadow: none;
      }
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
        height: 100%;
        width: 100%;
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
      /* styles for ratings   */

      .custom-h3 {
        margin: auto;
        padding-bottom: 10px;
      }
      .customRowTopRated {
        display: flex;
        justify-content: space-around;
      }
      .container .customRowTopRated .col-3{
        height: 250px;
        padding: 0;
      }

      .ratingList {
        display: flex;
        justify-content: center;
        font-size: 1.5em;
      }
      /* footer styles */
      .footer-basic {
        border-top: 7px solid var(--mainGreenColor);
        margin-top: 150px;
        padding-top: 30px;
        background-color: #222;
        color: #4b4c4d;
        bottom: 0;
      }
      .footer-basic h6 a {
        color: var(--mainGreenColor);
        text-decoration: none;
      }
      .social {
        display: flex;
        justify-content: center;
      }
      .social .fa {
        color: lightgrey;
      }
      .footer-copyright {
        padding: 15px 0;
        margin-top: 15px;
        opacity: 0.7;
        background-color: #151515
      }
      /*showContent view styles*/
      .header{
        font-size: 25px;
        border-left: 5px solid #ff3c2d;
        padding: 2px 11px;
       }
       .title-block{
        width: 715px;
        height: 330px;
        box-shadow: 0 15px 10px -10px rgba(0,0,0,0.5);
       }
       .overlay-pane{
        position: relative;
        height: 60px;
        width: 100%;
        bottom: 60px;
        background-color: rgba(0,0,0, .6);
       }
       .overlay-pane .ratingBlock{
        bottom: 0;
        height: 40px;
        top: 10px;
        left: 75px;
       }
       .overlay-pane .ratingList{
        font-size: 40px;
       }
       .serie-rating-pane{
        position: absolute;
        height: 48px;
        width: 48px;
        background: #00d254;
        left: 15px;
        top: 6px;
        text-align: center;
        font-size: 20px;
        color: #fff;
        line-height: 47px;
        border-radius: 3px;
       }
       .details-pane{
        height: 75px;
        width: 715px;
        line-height: 18px;
        margin: 25px 0 10px 0;
       }
       .details-pane p{
        font-size: 16px;
       }
       .details-pane div{
        margin: 0;
        padding-left: 15px;
       }
       .descr-pane p{
        padding-left: 16px;
        text-align: justify;
        text-indent: 25px;
       }
    </style>
  </head>

  <body>
    @include('layouts.header')

    <div class="container" style="margin-top: 80px;">
      @yield('content')
    </div>

    @include('layouts.footer')
  </body>
</html>