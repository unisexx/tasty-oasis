@extends('layouts.app')

@section('content')

<!--breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb breadcrumb-right-arrow d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="{{ url('') }}">@lang('Home')</a></li>
            <li class="breadcrumb-item">@lang('Review')</li>
            <li class="breadcrumb-item"><a href="{{ url('article') }}">@lang('Interesting articles')</a></li>
            <li class="breadcrumb-item active">{{ $article->title }}</li>
        </ol>
    </nav>
</div>
<!--breadcrumb-->

<!--############################### Content ###############################-->
<div class="container pt-3">
    <div class="title-page pb-5">{{ $article->title }}</div>
</div>
<div class="container pt-2 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8"><img src="{{ asset('storage/'.$article->image) }}" alt="" class="img-fluid mx-ato d-block"></div>
        <div class="col-md-12 mt-5">
            <div class="title-article">{{ $article->title }}</div>
            <div class="day-post text-left p-0">@lang('Posted on') {{ DBToDateThai($article->created_at, true, false, 'F') }}</div>
            {!! $article->body !!}
        </div>
    </div>

</div>
<!--############################### Content ###############################-->

@endsection
