@extends('layouts.app')

@section('content')

<!--breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb breadcrumb-right-arrow d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="{{ url('') }}">@lang('Home')</a></li>
            <li class="breadcrumb-item"><a href="{{ url('search') }}">@lang('Search')</a></li>
        </ol>
    </nav>
</div>
<!--breadcrumb-->

<!--############################### Content ###############################-->
<div class="container pt-3">
    <div class="title-page pb-5">@lang('Search') (<b>{{ $searchResults->count() }} results found for "{{ request('search') }}"</b>)</div>
</div>

<div class="container pb-4">
    <div class="row">
        <div class="col-md-12">
            @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                <h2>@lang(ucfirst($type))</h2>
                <ul>
                    @foreach($modelSearchResults as $searchResult)
                    <li><a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a></li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div>
</div>
<!--############################### Content ###############################-->

@endsection
