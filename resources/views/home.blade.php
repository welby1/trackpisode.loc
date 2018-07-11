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

        
    <div class="container ratingContainer">
        <div class="row"><h3>Top Rated Shows</h3></div>
        <div class="row customRowTopRated">
            <div class="col-3">
                <div class="imgBlock rounded">
                    <img class="img-fluid" src="img/thumb4.jpg">
                </div>
                <p class="textBlock text-center">Title</p>
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
            <div class="col-3">
                <div class="imgBlock rounded">
                    <img class="img-fluid" src="img/thumb5.jpg">
                </div>
                <p class="textBlock text-center">Title</p>
                <div class="ratingBlock">
                    <div class="ratingList">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="imgBlock rounded">
                    <img class="img-fluid" src="img/thumb6.jpg">
                </div>
                <p class="textBlock text-center">Title</p>
                <div class="ratingBlock">
                    <div class="ratingList">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row customRowTopRated">
            <div class="col-3">
                <div class="imgBlock rounded">
                    <img class="img-fluid" src="img/thumb7.jpg">
                </div>
                <p class="textBlock text-center">Title</p>
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
            <div class="col-3">
                <div class="imgBlock rounded">
                    <img class="img-fluid" src="img/thumb8.jpg">
                </div>
                <p class="textBlock text-center">Title</p>
                <div class="ratingBlock">
                    <div class="ratingList">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="imgBlock rounded">
                    <img class="img-fluid" src="img/thumb9.jpeg">
                </div>
                <p class="textBlock text-center">Title</p>
                <div class="ratingBlock">
                    <div class="ratingList">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
@endsection
