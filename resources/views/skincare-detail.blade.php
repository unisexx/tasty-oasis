@extends('layouts.app')

@section('content')

<!--breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb breadcrumb-right-arrow d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="{{ url('') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{ url('skincare') }}">ดูแลผิวพรรณ</a></li>
            <li class="breadcrumb-item"><a href="{{ url('skincare/category/'.$skincare->SkincareCategory->id) }}">{{ $skincare->SkincareCategory->name }}</a></li>
            <li class="breadcrumb-item active">{{ $skincare->name }}</li>
        </ol>
    </nav>
</div>
<!--breadcrumb-->

<!--############################### Content ###############################-->
<div class="container pt-3">
    <div class="title-page pb-5">{{ $skincare->name }}</div>
</div>

<div class="container pb-4">
    <div class="row bg-dot">
        <div class="col-md-12">
            <img src="{{ asset('storage/'.$skincare->image) }}" alt="" class="img-fluid mx-auto d-block">
            {!! $skincare->body !!}
        </div>
    </div>
</div>
<!--############################### Content ###############################-->

@endsection
