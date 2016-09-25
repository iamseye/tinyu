
@extends('front.layouts.mainLayout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('css/inside.css')}}">
@stop

@section('content')

    <div class="bannerInside">
        <h2>最新消息<span class="en">News</span></h2>
    </div>

    <div id="news_title">
        <div class="date">{{date_format($news->created_at,'Y-m-d')}}</div>
        <h3 class="title">{{$news->title}}</h3>
    </div>

    <div class="content">

        <div class="wrapper">

            {!! $news->content !!}

        </div>

        <a href="{{url()->previous()}}"><div id="back">
                回上層
            </div></a>
    </div>

@stop