@extends('layouts.master')

@section('content')
        <!--
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
        -->

<div class="row">       
    <div class="row col-lg-4 offset-lg-4"><h3 class="custom-h3">Top Rated Shows</h3></div>
    <div class="row customRowTopRated">
        <div class="col-lg-4">
            <div class="imgBlock rounded">
                <div class="hover-shadow"></div>
                <span class="show-year">2019</span>
                <img class="img-fluid" src="/upload/default-image.jpg">

                <div class="ratingBlock">
                    <div class="ratingList">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
            <p class="textBlock text-center col-lg-12"><a href="#">Title</a></p>
        </div>
        <div class="col-lg-4">
            <div class="imgBlock rounded">
                <div class="hover-shadow"></div>
                <span class="show-year">2019</span>
                <img class="img-fluid" src="/upload/default-image.jpg">

                <div class="ratingBlock">
                    <div class="ratingList">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
            <p class="textBlock text-center col-lg-12"><a href="#">Title</a></p>
        </div>
        <div class="col-lg-4">
            <div class="imgBlock rounded">
                <div class="hover-shadow"></div>
                <span class="show-year">2019</span>
                <img class="img-fluid" src="/upload/default-image.jpg">

                <div class="ratingBlock">
                    <div class="ratingList">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
            <p class="textBlock text-center col-lg-12"><a href="#">Title</a></p>
        </div>
        <div class="col-lg-4">
            <div class="imgBlock rounded">
                <div class="hover-shadow"></div>
                <span class="show-year">2019</span>
                <img class="img-fluid" src="/upload/default-image.jpg">

                <div class="ratingBlock">
                    <div class="ratingList">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
            <p class="textBlock text-center col-lg-12"><a href="#">Title</a></p>
        </div>
        <div class="col-lg-4">
            <div class="imgBlock rounded">
                <div class="hover-shadow"></div>
                <span class="show-year">2019</span>
                <img class="img-fluid" src="/upload/default-image.jpg">

                <div class="ratingBlock">
                    <div class="ratingList">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
            <p class="textBlock text-center col-lg-12"><a href="#">Title</a></p>
        </div>
        <div class="col-lg-4">
            <div class="imgBlock rounded">
                <div class="hover-shadow"></div>
                <span class="show-year">2019</span>
                <img class="img-fluid" src="/upload/default-image.jpg">

                <div class="ratingBlock">
                    <div class="ratingList">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
            <p class="textBlock text-center col-lg-12"><a href="#">Title</a></p>
        </div>
    </div>
</div>
        
@endsection
