
@extends('front.layouts.mainLayout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('css/inside.css')}}">
@stop

@section('content')

    <div class="bannerInside">
        <h2>{{$cate_name}}<span class="en">{{$cate_name_eng}}</span></h2>
    </div>

    <div class="content">

        <div id="productArea" class="wrapper">
            <div id="productPhoto">
                <div id="productPhotoB">
                    @foreach($pics as $pic)
                        <div class="productPhotoBcontant"><img src="{{url($pic->path)}}"></div>
                    @endforeach
                </div>
                <div id="productPhotoA">
                    @foreach($pics as $pic)
                        <div class="productPhotoAcontant"><img src="{{url($pic->path)}}"></div>
                    @endforeach
                </div>
            </div>
            <div id="productText">
                <h1>{{$product->name}}</h1>
                <h3>{{$product->eng_name}}</h3>
                <p>
                    {!!$product->description  !!}
                </p>
            </div>
        </div>

        <div id="productContent">
            <div class="wrapper">
                <h3>詳細介紹</h3>
                <p>
                    {!!$product->content  !!}

                </p>
            </div>
        </div>

        <a href="{{url()->previous()}}"><div id="back">
                回上層
            </div></a>

    </div>

@stop

@section('script')

    <script type="text/javascript">

        $(window).scroll(function(){
        });

        $(window).resize(function(){
        });


        $(document).ready(function(){
            $('#productPhotoB').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '#productPhotoA'
            });

            $('#productPhotoA').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                asNavFor: '#productPhotoB',
                dots: true,
                focusOnSelect: true
            });
        });


    </script>

@stop