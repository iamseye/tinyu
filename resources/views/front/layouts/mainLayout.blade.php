<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html>

<head>
    <title>庭宇木業</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">

    <link rel="shortcut icon" href="{{url('images/favicon.ico')}}">
    <link rel="icon" href="{{url('images/favicon.ico')}}" type="image/ico">
    <link rel="stylesheet" type="text/css" href="{{url('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/reset.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/base.css')}}">

    @yield('css')

</head>

<body>

<div id="wrapper">

    <div id="header">
        <a href="{{url('/')}}"><img id="logo" src="{{url('images/logo.png')}}"/></a>
        <ul id="mainMenu">
            <a href="{{url('/about')}}"><li>
                    <span class="en">About</span>
                    <span class="zh">關於庭宇</span>
                </li></a>
            <a href="{{url('/product/cate/1')}}"><li>
                    <span class="en">Chalet</span>
                    <span class="zh">行動木屋</span>
                </li></a>
            <a href="{{url('/product/cate/4')}}"><li>
                    <span class="en">Construction</span>
                    <span class="zh">工　　程</span>
                </li></a>
            <a href="{{url('/product/cate/3')}}"><li>
                    <span class="en">Furniture</span>
                    <span class="zh">木製家具</span>
                </li></a>
            <a href="{{url('/product/cate/2')}}"><li>
                    <span class="en">Material</span>
                    <span class="zh">材　　料</span>
                </li></a>
            <a href="{{url('/news')}}"><li>
                    <span class="en">News</span>
                    <span class="zh">最新消息</span>
                </li></a>
            <a href="{{url('/contact')}}"><li>
                    <span class="en">Contact</span>
                    <span class="zh">聯絡我們</span>
                </li></a>
        </ul>
        <ul id="social">
            <a href="" target="_blank"><li><img src="{{url('images/s_01.png')}}"></li></a>
            <a href=""><li><img src="{{url('images/s_02.png')}}"></li></a>
            <a href=""><li><img src="{{url('images/s_03.png')}}"></li></a>
        </ul>
    </div>

    @yield('content')


    <div id="footer">
        <div id="copyright">&copy; 2016. TYNG YEU 庭宇木業. All rights reserved.  Designed by <a href="http://circlestudio.idv.tw/" target="_blank">CircleStudio</a> & Jessie</div>
    </div>

</div>

<ul id="BgMenu">
    <a href="./about.html"><li>
            <span class="en">About</span>
            <span class="zh">關於庭宇</span>
        </li></a>
    <a href="./chalet.html"><li>
            <span class="en">Chalet</span>
            <span class="zh">行動木屋</span>
        </li></a>
    <a href="./cons.html"><li>
            <span class="en">Construction</span>
            <span class="zh">工　　程</span>
        </li></a>
    <a href="./furn.html"><li>
            <span class="en">Furniture</span>
            <span class="zh">木製家具</span>
        </li></a>
    <a href="./mate.html"><li>
            <span class="en">Material</span>
            <span class="zh">材　　料</span>
        </li></a>
    <a href="./news.html"><li>
            <span class="en">News</span>
            <span class="zh">最新消息</span>
        </li></a>
    <a href="./contact.html"><li>
            <span class="en">Contact</span>
            <span class="zh">聯絡我們</span>
        </li></a>
</ul>

<div id="openMenu">
    <div id="openMenuBefore"></div>
    <div id="openMenuAfter"></div>
</div>

<div id="closeMenu"></div>


<script type="text/javascript" src="{{url('js/jquery-1.10.2.js')}}"></script>
<script type="text/javascript" src="{{url('js/jquery.easing.1.3.js')}}"></script>
<script type="text/javascript" src="{{url('js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/menu.js')}}"></script>
<script type="text/javascript" src="{{url('js/content.js')}}"></script>
<script type="text/javascript" src="{{url('js/slick.js')}}"></script>
<script type="text/javascript" src="{{url('js/parallax.js')}}"></script>
<script type="text/javascript" src="{{url('js/waypoints.min.js')}}"></script>

@yield('script')
</body>



</html>