@extends('layouts.app')

@section('content')

<!--breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb breadcrumb-right-arrow d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="{{ url('') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item">บทความและรีวิว</li>
            <li class="breadcrumb-item active">รีวิวสินค้า</li>
        </ol>
    </nav>
</div>
<!--breadcrumb-->

<!--############################### Content ###############################-->
<div class="container pt-3">
    <div class="title-page pb-3">รีวิวสินค้า</div>
</div>

<div class="container mb-5">
    <div class="row">
        @foreach($product_reviews as $key => $product_review)
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('storage/'.$product_review->image) }}" alt="{{ $product_review->title }}">
                <div class="card-body">
                    <h4 class="title-review">{{ $product_review->title }}</h4>
                    <p class="card-text p-review">{{ $product_review->excerpt }}</p>
                    <a href="{{ url('product-review/detail/'. $product_review->id) }}" class="btn btn-outline-info">รีวิวสินค้า</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{!! $product_reviews->appends(@$_GET)->render() !!}

<!--############################### Content ###############################-->

@endsection
