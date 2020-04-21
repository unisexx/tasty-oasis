@extends('layouts.app')

@section('content')

<!--breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb breadcrumb-right-arrow d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="{{ url('') }}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Skincare')</li>
        </ol>
    </nav>
</div>
<!--breadcrumb-->

<!--############################### Content ###############################-->
<div class="container pt-3">
    <div class="title-page pb-5">@lang('Skincare')</div>
</div>

@foreach($skincare_categories as $key => $skincare_category)
    @php
        $skincare_category = $skincare_category->translate(App::getLocale());
    @endphp

    @if($loop->iteration  % 2 == 0)

        <div class="bg-gray mt-5 mb-5">
            <div class="container pb-4">
                <div class="row bg-dot">
                    <div class="col-md-6">
                        <img src="{{ asset('storage/'.$skincare_category->image) }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-6 my-auto position-relative">
                        <div class="title-acne">{{ $skincare_category->name }}</div>
                        <img src="{{ asset('app-assets/images/line-acne.jpg') }}" alt="" class="line-acne2">
                        <div class="col-md-10 mx-auto">
                            <p class="intro-acne">
                                {{ $skincare_category->body }}
                            </p>
                            <a class="btn-doctor4 d-block" href="{{ url('skincare/category/' . $skincare_category->id) }}" role="button">@lang('Read More')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else
    
        <div class="container pb-4">
            <div class="row bg-dot">
                <div class="col-md-6 my-auto position-relative">
                    <div class="title-acne">{{ $skincare_category->name }}</div>
                    <img src="{{ asset('app-assets/images/line-acne.jpg') }}" alt="" class="line-acne">
                    <div class="col-md-10 mx-auto">
                        <p class="intro-acne">
                            {{ $skincare_category->body }}
                        </p>
                        <a class="btn-doctor4 d-block mb-2" href="{{ url('skincare/category/' . $skincare_category->id) }}" role="button">@lang('Read More')</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('storage/'.$skincare_category->image) }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>

    @endif
@endforeach

{!! $skincare_categories->appends(@$_GET)->render() !!}
<!--############################### Content ###############################-->

@endsection
