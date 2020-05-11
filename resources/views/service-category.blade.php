@extends('layouts.app')

@section('content')

<!--breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb breadcrumb-right-arrow d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="{{ url('') }}">@lang('Home')</a></li>
            <li class="breadcrumb-item"><a href="#">@lang('Service')</a></li>
            <li class="breadcrumb-item active">{{ $service_category->name }}</li>
        </ol>
    </nav>
</div>
<!--breadcrumb-->

<!--############################### Content ###############################-->
<div class="container pt-3">
    <div class="title-page pb-5">@lang('Surgery')</div>
</div>

@foreach($services as $key => $service)
    @php
        $service = $service->translate(App::getLocale());
    @endphp

    @if($loop->iteration  % 2 != 0)

        <div class="container pb-4 @if($loop->last) pb-5 mb-5 @endif">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('storage/'.$service->image) }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 my-auto">
                    <p class="title-surgery text-center">{{ $service->title }}</p>
                    <img src="{{ asset('app-assets/images/line-art-2.png') }}" alt="" class="mx-auto d-block">
                    <p class="intro-surgery text-center">
                        {{ $service->excerpt }}
                    </p>
                    <a class="btn-doctor2 mx-auto d-block" href="{{ url('service/detail/'. $service->id) }}" role="button">@lang('Read More')</a>
                </div>
            </div>
        </div>

    @else

        <div class="bg-gray mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 my-auto second">
                        <p class="title-surgery text-center">{{ $service->title }}</p>
                        <img src="{{ asset('app-assets/images/line-art-2.png') }}" alt="" class="mx-auto d-block">
                        <p class="intro-surgery text-center">
                            {{ $service->excerpt }}
                        </p>
                        <a class="btn-doctor2 mx-auto d-block" href="{{ url('service/detail/'. $service->id) }}" role="button">@lang('Read More')</a>
                    </div>
                    <div class="col-md-6 first">
                        <img src="{{ asset('storage/'.$service->image) }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

    @endif
@endforeach

{!! $services->appends(@$_GET)->render() !!}
<!--############################### Content ###############################-->

@endsection
