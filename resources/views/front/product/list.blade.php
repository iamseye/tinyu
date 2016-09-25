
@extends('front.layouts.mainLayout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('css/inside.css')}}">
@stop

@section('content')

    <div class="bannerInside">
        <h2>{{$cate_name}}<span class="en">{{$cate_name_eng}}</span></h2>
    </div>

    <div class="content">
        <div class="space"></div>

        <ul class="productList wrapper">
            @for($i=0;$i<sizeof($products);$i++)
                @if($i!=0 && $i%3==0)
                    </ul><ul class="productList wrapper">

        @endif
                <a href="{{url('/product/'.$products[$i]->id)}}"><li>
                        <img src="{{url($products[$i]->pic->path)}}" />
                        <h3>{{$products[$i]->name}}</h3>
                        <p>
                            {{ strip_tags($products[$i]->description) }}
                        </p>
                </li></a>


            @endfor

        </ul>




        <div class="space"></div>

    </div>
@stop