@extends('layouts.app')

@section('content')

<!--breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb breadcrumb-right-arrow d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="{{ url('') }}">@lang('Home')</a></li>
            <li class="breadcrumb-item">@lang('Review')</li>
            <li class="breadcrumb-item active">@lang('Product Review')</li>
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
        @foreach($products as $key => $product)
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->title }}">
                <div class="card-body">
                    <h4 class="title-review">{{ $product->name }}</h4>
                    <p class="card-text p-review">{{ $product->body }}</p>
                    <a href="{{ url('product-review/detail/'. $product->id) }}" class="btn btn-outline-info">@lang('Product Review')</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{!! $products->appends(@$_GET)->render() !!}

<!--############################### Content ###############################-->

@endsection
