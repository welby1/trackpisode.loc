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
@guest
    <div class="row m-0" style="padding:50px 0; color:#666;font-weight:600;">
        <section class="col-lg-8">
            <section class="row col-lg-12 capability">
                <article class="row col-lg-6">
                    <article class="col-lg-2"><img src="/svg/list.svg"></article>
                    <article class="col-lg-10 cap-descr">Make your list of TV shows, put a rating</article>
                </article>
                <article class="row col-lg-6">
                    <article class="col-lg-2"><img src="/svg/calendar.svg"></article>
                    <article class="col-lg-10 cap-descr">Find out about the release date of the next new episodes</article>
                </article>
            </section>
            <section class="row col-lg-12 capability">
                <article class="row col-lg-6">
                    <article class="col-lg-2"><img src="/svg/checklist.svg"></article>
                    <article class="col-lg-10 cap-descr">Mark watched series</article>
                </article>
                <article class="row col-lg-6">
                    <article class="col-lg-2"><img src="/svg/chat.svg"></article>
                    <article class="col-lg-10 cap-descr">Comment, communicate with the audience</article>
                </article>
            </section>
        </section>
        <section class="col-lg-4" style="padding-top:27px">
            <button class="neu" onclick="document.location.href='{{ route('register') }}'">
                <span>Register</span>
            </button>
        </section>
    </div>
@endguest

<div class="row">       
    <div class="row col-lg-4 offset-lg-4"><h3 class="custom-h3">Top Rated Shows</h3></div>
    <div class="row customRowTopRated">
        @foreach ($series as $serie)
            <div class="col-lg-4">
                <div class="imgBlock rounded" onclick="document.location.href='show/{{ $serie->id }}'">
                    <div class="hover-shadow"></div>
                    <span class="show-year" title="Year">{{ $serie->releaseYear }}</span>
                    <span class="show-rating" title="voted {{ $serie->numberOFvotes }}">{{ number_format($serie->rating, 1) }}</span>
                    <img class="img-fluid" src="{{ $serie->posterPath }}">
                </div>
                <p class="textBlock text-center col-lg-12"><a href="show/{{ $serie->id }}">{{ $serie->title }}</a></p>
            </div>
        @endforeach
    </div>
</div>
        
@endsection
