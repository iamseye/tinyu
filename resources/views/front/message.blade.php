@extends('front.layouts.mainLayout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('css/inside.css')}}">
@stop

@section('content')

<div class="bannerInside">
    <h2>聯絡我們<span class="en">Contact</span></h2>
</div>

<div class="content">

    @include('layouts._errorMsg')

    <ul id="contactSelect">
        <li>聯絡方式</li>
        <li>留言給我們</li>
    </ul>

    <div id="contactArea">
        <div class="contactContent wrapper">
            <ul id="contactList">
                <li><div class="contactTitle">客服專線</div>{{$overview->contact_phone}}</li>
                <li><div class="contactTitle">客服信箱</div>{{$overview->contact_email}}</li>
                <li><div class="contactTitle">聯絡地址</div>{{$overview->contact_add}}</li>
            </ul>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d82205.74523000742!2d120.43611818192178!3d23.834703070914767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x772c275562d11712!2z5rqq5bee5YWs5ZyS!5e0!3m2!1szh-TW!2stw!4v1474353340726" id="map" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>

        <div class="contactContent wrapper">
            {!! Form::open(['method'=>'POST', 'url'=>'/message']) !!}


            <ul id="guestbook">
                <li>
                    <div class="guestItem">姓　　名</div>
                    <div class="guestItem">
                        {!! Form::text('name', null) !!}

                    </div>
                </li>
                <li>
                    <div class="guestItem">聯絡電話</div>
                    <div class="guestItem">
                        {!! Form::text('phone', null) !!}
                    </div>
                </li>
                <li>
                    <div class="guestItem">連絡信箱</div>
                    <div class="guestItem">
                        {!! Form::email('email', null) !!}
                    </div>
                </li>
                <li>
                    <div class="guestItem">內　　容</div>
                    <div class="guestItem">
                        {!! Form::textarea('content') !!}
                    </div>
                </li>
            </ul>

            <div id="guestbookBTN"><input type="reset" value="清除"><input type="submit" value="送出"></div>

            {!! Form::close() !!}

        </div>
    </div>

</div>

    @stop

@section('script')

    <script type="text/javascript" src="{{url('js/page.js')}}"></script>

@stop