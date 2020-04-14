@extends('layouts.app')

@section('content')

<!--breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb breadcrumb-right-arrow d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="{{ url('') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item active">ติดต่อเรา</li>
        </ol>
    </nav>
</div>
<!--breadcrumb-->

<!--############################### Content ###############################-->
<div class="container pt-3">
    <div class="title-page pb-5">ติดต่อเรา</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            {!! $contact->map !!}
        </div>
        <div class="col-md-4 bg-oasis-contact">
            <ul class="list-unstyled">
                <li><img src="{{ asset('app-assets/images/icon-mark.png') }}" alt="" class="icon-contact">
                    <h5>{{ $contact->name }}</h5>
                    {{ $contact->address }}
                </li>
                <li><img src="{{ asset('app-assets/images/icon-call.png') }}" alt="" class="icon-contact">
                    {{ $contact->tel }}
                </li>
                <li><img src="{{ asset('app-assets/images/icon-email.png') }}" alt="" class="icon-contact">
                    {{ $contact->email }}
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="bg-gray mt-5 p-5">
    <div class="container">
        <div class="row">
            <div class="title-contact">ส่งข้อความถึงเรา</div>
            <div class="col-md-12">
                <form class="login100-form validate-form" method="post" action="contact/save">
                    {{ csrf_field() }}
                    <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate="กรุณากรอก ชื่อ-สกุล">
                        <input type="text" class="input100" name="name">
                        <span class="focus-input100" data-placeholder="ชื่อ-สกุล *"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate="กรุณากรอก อีเมล">
                        <input type="text" class="input100" name="email">
                        <span class="focus-input100" data-placeholder="อีเมล *"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate="กรุณากรอก เบอร์โทรศัพท์">
                        <input type="text" class="input100" name="tel">
                        <span class="focus-input100" data-placeholder="เบอร์โทรศัพท์ *"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-t-85 m-b-35"
                        data-validate="กรุณากรอก ข้อมูลที่ต้องการสอบถาม">
                        <textarea name="message" rows="4" type="text" class="input100" style="line-height: 7;"></textarea>
                        <span class="focus-input100" data-placeholder="ข้อมูลที่ต้องการสอบถาม *"></span>
                    </div>

                    <button type="submit" class="btn-doctor5 d-block mt-5">ส่งข้อความ</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!--############################### Content ###############################-->

@endsection

@push('js')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\ContactRequest') !!}
@endpush
