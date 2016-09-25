
@extends('front.layouts.mainLayout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('css/inside.css')}}">
@stop

@section('content')

    <div class="bannerInside">
        <h2>{{$cate_name}}<span class="en">{{$cate_name_eng}}</span></h2>
    </div>

    <div class="content">

        <div class="chalet" class="textLeft">
            <div class="insidePhoto">
                @foreach($pics as $pic)
                <div class="insidePhotoContent">
                    <img src="{{url($pic->path)}}" />
                </div>
                @endforeach
            </div>
            <div class="insideText">
                <h1>{{$product->name}}</h1>
                <h2>{{$product->eng_name}}</h2>
                <div class="textArea">
                    <p>
                        {!!$product->description !!}
                    </p>
                </div>
            </div>
        </div>

        <div class="chaletContent">
            <div class="wrapper">
                <h3>詳細介紹</h3>
                <p>
                    {!!$product->content  !!}
                </p>
                <div id="explodeB">
                    @foreach($carouselPics as $carouselPic)
                    <div class="explodeBcontant"><img src="{{url($carouselPic->path)}}"></div>
                    @endforeach
                </div>

                <div id="explodeA">
                    @foreach($carouselPics as $carouselPic)
                        <div class="explodeBcontant"><img src="{{url($carouselPic->path)}}"></div>
                    @endforeach
                </div>
            </div>

            <div id="bottomBanner">
                @foreach($areaPics as $pic)
                    <img src="{{url($pic->path)}}" />
                @endforeach
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
            $(".insidePhoto").slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000
            });

            $('#explodeB').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '#explodeA'
            });

            $('#explodeA').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                asNavFor: '#explodeB',
                dots: true,
                focusOnSelect: true
            });
        });


    </script>

@stop