
@extends('front.layouts.mainLayout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('css/inside.css')}}">
@stop

@section('content')

<div class="bannerInside">
    <h2>關於庭宇<span class="en">About</span></h2>
</div>

<div class="content">
    <div class="wrapper">
        <div class="aboutText">
            <p>
                {{$about}}
            </p>
        </div>
    </div>
</div>

@stop