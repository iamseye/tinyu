@extends('front.layouts.mainLayout')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('css/inside.css')}}">
@stop
@section('content')

<div class="bannerInside">
    <h2>行動木屋<span class="en">Chalet</span></h2>
</div>

<div class="content">
    @foreach($products as $product)
    <div class="insideChalet textLeft" style="background:url('{{url($product->pic->path)}}') center no-repeat; background-size:cover;">
        <img class="RWDshow" src="{{url($product->pic->path)}}" />
        <div class="textArea">
            <h2>{{$product->name}}</h2>
            <p>
                {{ strip_tags($product->description) }}
            </p>
            <a class="btn" href="{{url('/product/'.$product->id)}}">閱讀更多</a>
        </div>
    </div>
    @endforeach
</div>

@stop