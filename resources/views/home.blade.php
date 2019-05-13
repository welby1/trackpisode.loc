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
        @foreach ($series as $serie)
            <div class="col-lg-4">
                <div class="imgBlock rounded">
                    <div class="hover-shadow"></div>
                    <span class="show-year" title="Year">{{ $serie->releaseYear }}</span>
                    <span class="show-rating" title="{{ $serie->numberOFvotes }}">{{ number_format($serie->rating, 1) }}</span>
                    <img class="img-fluid" src="{{ $serie->posterPath }}">
                </div>
                <p class="textBlock text-center col-lg-12"><a href="show/{{ $serie->id }}">{{ $serie->title }}</a></p>
            </div>
        @endforeach
    </div>
</div>
        
@endsection
