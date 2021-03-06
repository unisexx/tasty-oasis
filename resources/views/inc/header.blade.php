@php
    $contact = App\Contact::firstOrFail()->translate(App::getLocale());
    $surgeries = App\Surgery::where('status', 1)->orderBy('order','asc')->get()->translate(App::getLocale());
    $service_categories = App\ServiceCategory::orderBy('order','asc')->get()->translate(App::getLocale());
    $product_categories = App\ProductCategory::with('translations')->orderBy('order','asc')->get()->translate(App::getLocale());
    $skincare_categories = App\SkincareCategory::orderBy('order','asc')->get()->translate(App::getLocale());
@endphp

<section class="bg-top p-2">
    <div class="container position-relative">
        <div class="row">
            <div class="col-md-3 my-auto">
                <ul class="list-unstyled list-group list-group-horizontal align-items-center">
                    <li class="p-2"><a href="{{ $contact->facebook }}"><img src="{{ asset('app-assets/images/icon-facebook.png') }}" alt="" width="32"></a></li>
                    <li class="p-2"><a href="{{ $contact->twitter }}"><img src="{{ asset('app-assets/images/icon-twitter.png') }}" alt="" width="32"></a></li>
                    <li class="p-2"><a href="{{ $contact->line }}"><img src="{{ asset('app-assets/images/line_ico.png') }}" alt="" width="32"></a></li>
                    <li class="p-2"><a href="{{ $contact->instagram }}"><img src="{{ asset('app-assets/images/icon-instagram.png') }}" alt="" width="32"></a></li>
                </ul>
                <div><img src="{{ asset('app-assets/images/icon-phone.png') }}" alt="" class="ml-3"> <span class="space-font">{{ $contact->tel }}</span></div>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ asset('app-assets/images/logo.png') }}" alt="">
            </div>
            <div class="wrap-flag">
                <nav class="navbar navbar-expand-lg navbar-dark bg-none rounded flag">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            @if(App::isLocale('th'))
                            <a class="nav-link dropdown-toggle text-flag" href="{{ url('change/th') }}" id="dropdown-flag"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                    class="flag-icon flag-icon-th"> </span> Thai</a>
                            @endif
                            @if(App::isLocale('en'))
                            <a class="nav-link dropdown-toggle text-flag" href="{{ url('change/en') }}" id="dropdown-flag"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                    class="flag-icon flag-icon-us"> </span> English</a>
                            @endif
                            @if(App::isLocale('cn'))
                            <a class="nav-link dropdown-toggle text-flag" href="{{ url('change/cn') }}" id="dropdown-flag"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                    class="flag-icon flag-icon-cn"> </span> China</a>
                            @endif
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                                @if(!App::isLocale('th'))
                                    <a class="dropdown-item" href="{{ url('change/th') }}"><span class="flag-icon flag-icon-th"> </span> Thai</a>
                                @endif
                                @if(!App::isLocale('en'))
                                    <a class="dropdown-item" href="{{ url('change/en') }}"><span class="flag-icon flag-icon-us"> </span> English</a>
                                @endif
                                @if(!App::isLocale('cn'))
                                    <a class="dropdown-item" href="{{ url('change/cn') }}"><span class="flag-icon flag-icon-cn"> </span> China</a>
                                @endif
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-3 my-auto">
                <form class="form-inline my-2 my-lg-0 ml-3" method="GET" action="{{ url('search') }}">
                    {{ csrf_field() }}
                    <i class="fa fa-search h1 text-muted mt-1"></i>
                    <input name="search" class="form-control border-0 bg-transparent w-85" type="text" placeholder="SEARCH" aria-label="Search" value="{{ @$_GET['search'] }}">
                </form>
            </div>
        </div>
        <hr class="hr001">
        <!--topmenu-->
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light topmenu">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('') }}">@lang('Home') <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('about') }}">@lang('About Us')</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"
                                id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                @lang('Service')
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                {{-- <a class="dropdown-item" href="{{ url('surgery') }}">@lang('Surgery')</a>
                                <a class="dropdown-item" href="{{ url('skincare') }}">@lang('Skincare')</a> --}}
                                @foreach($service_categories as $service_category)
                                <a class="dropdown-item" href="{{ url('service/category/'.$service_category->id) }}">{{ $service_category->name }}</a>
                                @endforeach
                            </div>
                        </li>
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" onclick="location.href='{{ url('surgery') }}'"
                                id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                @lang('Surgery')
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($surgeries as $surgery)
                                    <a class="dropdown-item" href="{{ url('surgery/detail/'.$surgery->id) }}">{{ $surgery->title }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" onclick="location.href='{{ url('skincare') }}'"
                                id="navbar2Dropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                @lang('Skincare')
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbar2Dropdown">
                                @foreach ($skincare_categories as $skincare_category)
                                    <a class="dropdown-item" href="{{ url('skincare/category/'.$skincare_category->id) }}">{{ $skincare_category->name }}</a>
                                @endforeach
                            </div>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('promotion') }}">@lang('Promotion')</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" 
                            id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @lang('Product')
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($product_categories as $product_category)
                                    <a class="dropdown-item" href="{{ url('product/category/'.$product_category->id) }}">{{ $product_category->name }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @lang('Review')
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('article') }}">@lang('Interesting articles')</a>
                                <a class="dropdown-item" href="{{ url('product-review') }}">@lang('Product Review')</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('testimonial') }}">@lang('Testimonial')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('contact') }}">@lang('Contact')</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <!--topmenu-->
    </div>
</section>
