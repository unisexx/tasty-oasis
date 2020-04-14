@extends('layouts.app')

@section('content')

<!--breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb breadcrumb-right-arrow d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="{{ url('') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item">บทความและรีวิว</li>
            <li class="breadcrumb-item"><a href="{{ url('product-review') }}">รีวิวสินค้า</a></li>
            <li class="breadcrumb-item active">{{ $product_review->title }}</li>
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
        <div class="col-md-4">
            <img src="{{ asset('storage/'.$product_review->image) }}" alt="" class="img-fluid">
        </div>
        <div class="col-md-8">
            <p class="title-products">{{ $product_review->title }}</p>
            {!! $product_review->body !!}
        </div>
    </div>

</div>
<!--############################### Content ###############################-->

@endsection
