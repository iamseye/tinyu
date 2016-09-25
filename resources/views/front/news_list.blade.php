
@extends('front.layouts.mainLayout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('css/inside.css')}}">
@stop

@section('content')

<div class="bannerInside">
    <h2>最新消息<span class="en">News</span></h2>
</div>

<div class="content">

    <ul id="newsList">
        @foreach($news as $new)
            <li>
                <div class="date">{{date_format($new->created_at,'Y-m-d')}}</div>
                <h3 class="title">{{$new->title}}</h3>
                <a href="{{url('/news/'.$new->id)}}" class="btn">閱讀更多</a>
            </li>
        @endforeach

    </ul>

    @include('admin.layouts._pagination',['paginator' => $news])


</div>

    @stop