@extends('layouts.app')

@section('content')

<!--breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb breadcrumb-right-arrow d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="{{ url('') }}">@lang('Home')</a></li>
            <li class="breadcrumb-item">@lang('Medical specialist')</li>
            <li class="breadcrumb-item active">{{ $doctor->name }}</li>
        </ol>
    </nav>
</div>
<!--breadcrumb-->

<!--############################### Content ###############################-->
<div class="container pb-5 pt-3">
    <div class="title-page pb-5">{{ $doctor->name }}</div>
    <div class="row">
        <div class="col-md-5">
            <img src="{{ asset('storage/'.$doctor->image) }}" alt="" class="img-fluid mb-4">
        </div>
        <div class="col-md-7 pt-3">
            <span class="title-education">@lang('Education')</span>
            <div class="education">
                {!! $doctor->education !!}
            </div>
            <p class="education"><span class="title-education">@lang('Experience') :</span>
                {!! $doctor->experience !!}
            </p>
        </div>
    </div>
</div>
<!--############################### Content ###############################-->

@endsection