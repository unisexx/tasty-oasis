@extends('layouts.app')

@section('content')

<!--breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb breadcrumb-right-arrow d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="{{ url('') }}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Product')</li>
            <li class="breadcrumb-item active">{{ $product_category->name }}</li>
        </ol>
    </nav>
</div>
<!--breadcrumb-->

<!--############################### Content ###############################-->
<div class="container mb-4 pt-3">
    <div class="title-page pb-3">{{ $product_category->name }}</div>
</div>
<div class="container">
    @foreach($products as $product)
    @php
        $product = $product->translate(App::getLocale());
    @endphp
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('storage/'.$product->image) }}" alt="" class="img-fluid">
        </div>
        <div class="col-md-8">
            <p class="title-products">{{ $product->name }}</p>
            <p class="intro">{{ $product->body }}</p>
            <p class="prize">{{ @number_format($product->price, 2) }} @lang('Baht')</p>
            
            @if(isset($product->review))
                <a href="{{ url('product-review/detail/'.$product->id) }}" type="button" class="btn btn-light">@lang('Product Review')</a>
            @endif
        </div>
    </div>
    <hr>
    @endforeach
</div>


{!! $products->appends(@$_GET)->render() !!}
<!--############################### Content ###############################-->

@endsection