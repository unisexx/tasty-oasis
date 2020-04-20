@extends('layouts.app')

@section('content')

<!--breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb breadcrumb-right-arrow d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="{{ url('') }}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Testimonial')</li>
        </ol>
    </nav>
</div>
<!--breadcrumb-->

<!--############################### Content ###############################-->
<div class="container pt-3">
    <div class="title-page pb-5">@lang('Testimonial')</div>
</div>

<div class="container mt-3">
@foreach($testimonials->chunk(4) as $key => $chunk)
    <div class="row justify-content-center {{ $key != 0 ? 'mt-5' : '' }}">
        @foreach($chunk as $testimonial)
            <div class="col-md-3 card noborder text-center">
                <div class="size-img mb-3">
                    <img src="{{ asset('storage/'.$testimonial->image) }}" alt="" class="rounded-circle img-fluid ">
                </div>
                <div class="name-test">{{ $testimonial->name }}</div>
                <hr class="line-test mx-auto">
                <p>{{ $testimonial->review }}</p>
            </div>
        @endforeach 
    </div>
@endforeach
</div>

{!! $testimonials->appends(@$_GET)->render() !!}
<!--############################### Content ###############################-->

@endsection
