@extends('layouts.app')

@section('content')

<!--breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb breadcrumb-right-arrow d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="{{ url('') }}">@lang('Home')</a></li>
            <li class="breadcrumb-item"><a href="{{ url('surgery') }}">@lang('Surgery')</a></li>
            <li class="breadcrumb-item active">{{ $surgery->title }}</li>
        </ol>
    </nav>
</div>
<!--breadcrumb-->

<!--############################### Content ###############################-->
<div class="container pt-3">
    <div class="title-page pb-5">{{ $surgery->title }}</div>
</div>

<div class="container pb-4">
    <div class="row bg-dot">
        <div class="col-md-12">
            {!! $surgery->body !!}
        </div>
    </div>
</div>


<!--############################### Content ###############################-->

@endsection
