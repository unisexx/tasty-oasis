@extends('layouts.app')

@section('content')

<!--breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb breadcrumb-right-arrow d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="{{ url('') }}">@lang('Home')</a></li>
            <li class="breadcrumb-item"><a href="#">@lang('Service')</a></li>
            <li class="breadcrumb-item"><a href="{{ url('service/category/'.$service->ServiceCategory->id) }}">{{ $service->ServiceCategory->name }}</a></li>
            <li class="breadcrumb-item active">{{ $service->title }}</li>
        </ol>
    </nav>
</div>
<!--breadcrumb-->

<!--############################### Content ###############################-->
<div class="container pt-3">
    <div class="title-page pb-5">{{ $service->title }}</div>
</div>

<div class="container pb-4">
    <div class="row bg-dot">
        <div class="col-md-12">
            {!! $service->body !!}
        </div>
    </div>
</div>


<!--############################### Content ###############################-->

@endsection
