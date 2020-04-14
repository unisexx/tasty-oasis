@extends('layouts.app')

@section('content')

<!--breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb breadcrumb-right-arrow d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="{{ url('') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item">บทความและรีวิว</li>
            <li class="breadcrumb-item active">บทความที่น่าสนใจ</li>
        </ol>
    </nav>
</div>
<!--breadcrumb-->

<!--############################### Content ###############################-->
<div class="container pt-3">
    <div class="title-page pb-5">บทความที่น่าสนใจ</div>
</div>
<div class="container pt-2">
    @foreach($articles as $key => $article)
    <div class="row text-center {{ $key != 0 ? 'mt-4' : '' }}">
        <div class="col-md-12">
            <img src="{{ asset('storage/'.$article->image) }}" alt="" class="img-fluid">
            <div class="day-post">โพสต์เมื่อ {{ DBToDateThai($article->created_at, true, false, 'F') }}</div>
            <div class="title-article">{{ $article->title }}</div>
            <img src="images/line-art-3.png" alt="" class="mt-3">
            <p class="intro-article">{{ $article->excerpt }}</p></p>
            <a href="{{ url('article/detail/'. $article->id) }}" class="btn-doctor5 mx-auto d-block">อ่านเพิ่มเติม ></a>
            <hr class="line-article">
        </div>
    </div>
    @endforeach
</div>


{!! $articles->appends(@$_GET)->render() !!}

<!--############################### Content ###############################-->

@endsection
