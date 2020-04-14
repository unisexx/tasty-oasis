@extends('layouts.app')

@section('content')

<!--############################### Carousel ###############################-->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach( $hilights as $key => $hilight )
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach( $hilights as $key => $hilight )
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            @if($hilight->url) <a href="{{ url($hilight->url) }}"> @endif
                <img class="img-fluid" src="{{ asset('storage/'.$hilight->image) }}" alt="{{ $hilight->title }}">
            @if($hilight->url) </a> @endif
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!--############################### Carousel ###############################-->

@endsection
