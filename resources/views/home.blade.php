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

<!--############################### testimonial ###############################-->
<div class="testimonial mt-8">
    <div class="text-center"><span class="title-service1">เสียงจาก</span> <span class="title-service2">ลูกค้า</span>
    </div>
    <div class="container mt-3">
        <div class="row justify-content-center">
            @foreach($testimonials as $testimonial)
            <div class="col-md-3 card noborder text-center m-4">
                <div class="size-img mb-3">
                    <img src="{{ asset('storage/'.$testimonial->image) }}" alt="" class="rounded-circle">
                </div>
                <div class="name-test">{{ $testimonial->name }}</div>
                <hr class="line-test mx-auto">
                <p>{{ $testimonial->review }}</p>
            </div>
            @endforeach
        </div>
        <div class="btn-all-service btn-test">
            <hr class="line-01">
            <a href="{{ url('testimonial') }}" class="text-allservice">ดูทั้งหมด</a>
            <hr class="line-01">
        </div>
    </div>
</div>
<!--############################### testimonial ###############################-->

<!--############################### doctor ###############################-->
<div class="doctor bg-doctor mt-5 pb-5">
    <div class="container">
        <div class="row pt-5">
            <div class="col-md-6">
                <div class="title-doctor">แพทย์ผู้เชี่ยวชาญ</div>
                <p class="name-doctor">{{ $doctor->name }}</p>
                <span class="title-education">การศึกษา</span>
                <div class="education">
                    {!! $doctor->education !!}
                </div>
                <p class="education"><span class="title-education">ประสบการณ์ :</span> 
                    {!! $doctor->experience !!}
                </p>
                <a class="btn-doctor" href="{{ url('doctor/profile/'. $doctor->id) }}">อ่านเพิ่มเติม ></a>
            </div>
            <div class="col-md-6 frame-doctor">
                <img src="{{ asset('storage/'.$doctor->image) }}" alt="" class="img-fluid mx-auto my-auto">
            </div>
        </div>

    </div>
    <!-- start flower -->
    <div class="flower">
    </div>
    <!-- end flower -->
</div>
<!--############################### doctor ###############################-->

@endsection
