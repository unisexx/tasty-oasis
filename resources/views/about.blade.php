@extends('layouts.app')

@section('content')

<!--breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb breadcrumb-right-arrow d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="{{ url('') }}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('About Us')</li>
        </ol>
    </nav>
</div>
<!--breadcrumb-->

<!--############################### Content ###############################-->
<div class="container pb-5 pt-3">
    <div class="title-page pb-5">@lang('About Us')</div>
    {!! $about->body !!}
    
    <!--doctor-->
    <hr class="line-about mt-5 mb-5">
    <div class="why">
        @lang('HeadMedical specialist')<br>
        <img src="{{ asset('app-assets/images/line-art.png') }}" alt="">
    </div>
    <div class="row justify-content-center mt-5 mb-5">
        @foreach( $doctors as $doctor )
            <div class="col-md-4 text-center mb-5">
                <div class="doctor-size-img">
                    <img src="{{Voyager::image($doctor->thumbnail('cropped'))}}" alt="" class="rounded-circle img-fluid">
                </div>
                <p class="name-doctor2">{{ $doctor->getTranslatedAttribute('name') }}</p>
                <p>{{ $doctor->getTranslatedAttribute('position') }}</p>
                <a href="{{ url('doctor/profile/'. $doctor->id) }}" class="btn-doctor3 mx-auto d-block">@lang('Read More')</a>
            </div>
        @endforeach
    </div>

</div>



<!--############################### Content ###############################-->

@endsection
