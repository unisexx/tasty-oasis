@extends('layouts.app')

@section('content')

<!--breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb breadcrumb-right-arrow d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="{{ url('') }}">@lang('Home')</a></li>
            <li class="breadcrumb-item">@lang('Review')</li>
            <li class="breadcrumb-item active">@lang('Interesting articles')</li>
        </ol>
    </nav>
</div>
<!--breadcrumb-->

<!--############################### Content ###############################-->
<div class="container pt-3">
    <div class="title-page pb-5">@lang('Interesting articles')</div>
</div>
<div class="container pt-2">
    @foreach($articles as $key => $article)
    <div class="row text-center {{ $key != 0 ? 'mt-4' : '' }}">
        <div class="col-md-12">
            <img src="{{ asset('storage/'.$article->image) }}" alt="" class="img-fluid">
            <div class="day-post">@lang('Posted on') {{ DBToDateThai($article->created_at, true, false, 'F') }}</div>
            <div class="title-article">{{ $article->title }}</div>
            <img src="images/line-art-3.png" alt="" class="mt-3">
            <p class="intro-article">{{ $article->excerpt }}</p></p>
            <a href="{{ url('article/detail/'. $article->id) }}" class="btn-doctor5 mx-auto d-block">@lang('Read More')</a>
            <hr class="line-article">
        </div>
    </div>
    @endforeach
</div>


{!! $articles->appends(@$_GET)->render() !!}

<!--############################### Content ###############################-->

@endsection
