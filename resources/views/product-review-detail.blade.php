@extends('layouts.app')

@section('content')

<!--breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb breadcrumb-right-arrow d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="{{ url('') }}">@lang('Home')</a></li>
            <li class="breadcrumb-item">@lang('Review')</li>
            <li class="breadcrumb-item"><a href="{{ url('product-review') }}">@lang('Product Review')</a></li>
            <li class="breadcrumb-item active">{{ $product->name }}</li>
        </ol>
    </nav>
</div>
<!--breadcrumb-->

<!--############################### Content ###############################-->
<div class="container pt-3">
    <div class="title-page pb-3">@lang('Product Review')</div>
</div>
<div class="container mb-5">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('storage/'.$product->image) }}" alt="" class="img-fluid">
        </div>
        <div class="col-md-8">
            <p class="title-products">{{ $product->name }}</p>
            {!! $product->review !!}
        </div>
    </div>

</div>
<!--############################### Content ###############################-->

@endsection
