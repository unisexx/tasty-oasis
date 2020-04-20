@extends('layouts.app')

@section('content')

<!--breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb breadcrumb-right-arrow d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="{{ url('') }}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Promotion')</li>
        </ol>
    </nav>
</div>
<!--breadcrumb-->

<!--############################### Content ###############################-->
<div class="container pt-3">
    <div class="title-page pb-5">@lang('Promotion')</div>
</div>

<div class="container">
    <div class="row">
        @foreach( $promotions as $promotion)
            <div class="col-12 col-md-6 col-xl-4">
                <a class="d-flex flex-column align-items-end justify-content-between block-promotions" href="{{ url('promotion/detail/'.$promotion->id) }}">
                    <img src="{{ asset('storage/'.$promotion->image) }}" alt="" class="img-fluid pic-promotions">
                </a>
            </div>
        @endforeach
    </div>
</div>



{!! $promotions->appends(@$_GET)->render() !!}
<!--############################### Content ###############################-->

@endsection
