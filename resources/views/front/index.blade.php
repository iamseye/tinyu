@extends('front.layouts.mainLayout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('css/index.css')}}">
@stop

@section('content')

    <div id="bannerIndex">
        @foreach($index_pics as $pics)
            <div class="bannerIndexContent">
                <img src="{{$pics->path}}" />
            </div>
        @endforeach

    </div>

    @foreach($products as $product)
    <!--div id="indexChalet" class="textLeft parallax-window " data-parallax="scroll" data-image-src="./images/chalet01.jpg"-->
        <div id="indexChalet" class="textLeft" style="background:url({{url($product->product_picture->path)}}) center no-repeat; background-size:cover;">
            <img class="RWDshow" src="{{url($product->product_picture->path)}}" />
            <div class="textArea">
                <h2>{{$product->name}}</h2>
                <p>
                    {!!$product->description  !!}
                </p>
                <a class="btn" href="{{url('/product/'.$product->id)}}">閱讀更多</a>
            </div>
        </div>
    @endforeach

    <div id="indexAbout">
        <div class="wrapper">
            <h2>關於庭宇</h2>
            <div class="aboutText">
                <p>
                    {{$about}}
                </p>
            </div>
        </div>

        <div id="newsTitle">
            <h2>最新消息</h2>
        </div>

        <ul id="newsList">
            @foreach($news as $n)
                <li>
                    <div class="date">{{ date_format($n->created_at,'Y-m-d')}}</div>
                    <h3 class="title">{{$n->title}}</h3>
                    <a href="{{url('/news/'.$n->id)}}" class="btn">閱讀更多</a>
                </li>
            @endforeach
        </ul>
        <a href="{{url('/news')}}" id="back">查看全部</a>
    </div>

@stop

@section('script')
    <script type="text/javascript">

        $(window).scroll(function(){
        });

        $(window).resize(function(){
        });


        $(document).ready(function(){
            $("#bannerIndex").slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000
            });
        });


    </script>
    @stop