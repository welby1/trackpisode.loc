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
      /* highlight selection color */
      *::selection {
        background: rgba(0,210,84,.4);
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
      .show-year, .show-rating{
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
        cursor: default;
      }
      .show-rating{ top:40px !important; }

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
      .textBlock a {
        color: #000;
        text-decoration: none;
      }
      /* styles for ratings   */

      .custom-h3 {
        margin: auto;
        padding-bottom: 10px;
        cursor: default;
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
        cursor: default;
        width: 100%;
       }
      .accordion{
        background-color: #cccccc;
        cursor: pointer;
        transition: 0.4s;
       }
      .active-accordion, .accordion:hover{
        background-color: #aaaaaa;
       }
      .accordion-panel{
        display: none;
        overflow: hidden;
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
        height: 30px;
        top: 15px;
        left: 75px;
       }
      .overlay-pane .ratingList{
        font-size: 30px;
       }
       /* rating stars styles */
      .checked {
        color: orange;
       }
       .hover-star{
        color: yellow;
       }
       /*scale one star rating*/
      .ratingList span:hover {
        transform: scale3d(1.3, 1.3, 1);
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
        cursor: default;
       }
      .details-pane{
        height: 75px;
        width: 715px;
        line-height: 18px;
        margin: 25px 0 10px 0;
        cursor: default;
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
      .seasons-list{
        border-collapse: collapse;
        background: #f1f1f1;
       }
      .seasons-list td{
        border: 1px solid #fff;
        vertical-align: middle;
        color: #1f1f1f;
        padding: 8px 10px;
        cursor: default;
       }
      .placeholder{
        width: 14px !important;
        padding: 0 !important;
       }
      .haveseen-area{
        width: 30px !important;
       }
      .episode-number{
        width: 10%;
       }
      .episode-title{
        width: 60%;
       }
      .episode-airdate{
        width: 20%;
       }
      .haveseen-btn{
        border-radius: 3px;
        border: 2px solid #745ec5;
        width: 26px;
        height: 26px;
        cursor: pointer;
        background: url(/img/pink-eye-icon.png) center no-repeat;
       }
      .active-eye{
        background: url(/img/white-eye-icon.png) center no-repeat;
        background-color: #745ec5;
       }
       /* drop area for header */
      #header-droparea{
        padding: 0;
        overflow-y: auto;
        height: 150px;
        margin-top: 103px;
        position: absolute;
        z-index: 999;
        display: none;
       }
      #header-droplist{
        margin: 0;
        padding: 0;
        list-style: none;
        width: 100%;
        position: absolute;
        z-index: 999;
      }
      #header-droplist a{
        color: var(--mainGreenColor);
      }
      /* scrollbar for suggestion list header*/
      #header-droparea::-webkit-scrollbar {
        width: 7px;
        background-color: #b5bac0;
        border-radius:15px; 
      }
      #header-droparea::-webkit-scrollbar-thumb{
        background-color: #00d254;
        border-radius: 15px;
      }

       /* add episodes drop area */
      #droparea{
        padding: 0;
        overflow-y: auto;
        height: 150px;
        margin-top: 45px;
        position: absolute;
        z-index: 999;
       }
      #droplist{
        margin: 0;
        padding: 0;
        list-style: none;
        width: 100%;
        position: absolute;
        z-index: 999;
      }
      .li-custom{
        padding: 6px 12px;
        background-color: #fff;
        border-bottom:1px solid gray;
        cursor: pointer;
      }
      .li-custom:hover{
        background-color: lightgray;
        padding-left: 17px;
      }
      /* scrollbar for suggestion list */
      #droparea::-webkit-scrollbar {
        width: 7px;
        background-color: #b5bac0;
        border-radius:15px; 
      }
      #droparea::-webkit-scrollbar-thumb{
        background-color: #00d254;
        border-radius: 15px;
      }
      /* search button effect in navbar */
      .btn-outline-success:hover > .fa-search{
        transform: scale(1.4);
      }
      /* scrollbar global */
      ::-webkit-scrollbar {
        width: 11px;
        background-color: #b5bac0;
      }
      ::-webkit-scrollbar-thumb{
        background-color: #00d254;
        border-radius: 15px;
      }
      ::-webkit-scrollbar-thumb:hover{
        background-color: rgb(0,210,30);
      }

    </style>
  </head>

  <body>
    @include('layouts.header')

    <div class="container" style="margin-top: 80px;padding-bottom: 170px">
      @yield('content')
    </div>

    @include('layouts.footer')
  </body>
</html>