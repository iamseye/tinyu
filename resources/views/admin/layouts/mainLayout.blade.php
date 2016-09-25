<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html>

<head>
    <title>庭宇木業後台管理系統</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="{{url('images/favicon.ico')}}">
    <link rel="icon" href="{{url('images/favicon.ico')}}" type="image/ico">
    <link rel="stylesheet" type="text/css" href="{{url('admin/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('admin/css/table.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('admin/css/inside.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('admin/css/reset.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{url('css/lightbox.min.css')}}">

    <style>
        .img-rounded {
            width: 50px;
            height: 50px;
        }
    </style>
    @yield('css')

</head>

<body>

<div id="wrapper">

    <div id="header" class="shadow">
        <ul id="accountBox" class="wrapper">
            <a href="{{url('/logout')}}"><li>登出</li></a>
            <a href="{{url('/')}}"><li>網頁前台</li></a>
        </ul>
        <div class="wrapper">
            <img id="logo" src="{{url('images/logo.png')}}" />
            <h1>庭宇木木後台管理系統</h1>
            <ul id="mainMenu">
                <a href="{{url('admin/overview/')}}"><li class="this">頁面資訊</li></a>
                <a href="{{url('admin/product/cate/1')}}"><li>作品管理</li></a>
                <a href="{{url('admin/news/cate/note')}}"><li>最新消息</li></a>
                <a href="{{url('admin/msg/')}}"><li>查看留言</li></a>
            </ul>
        </div>
    </div>

    <div id="content" class="wrapper">
        @yield('content')
    </div>


    <div id="footer">
			<span id="copyright">
				© 2016. CircleStudio 圓設計工作室 ＆Ｊessie. All rights reserved
			</span>
    </div>
</div>

<div id="BgMenu">
    <ul id="footerMenu">
        <a href="{{url('admin/overview/')}}"><li class="this">頁面資訊</li></a>
        <a href="{{url('admin/product/cate/1')}}"><li>作品管理</li></a>
        <a href="{{url('admin/news/cate/note')}}"><li>最新消息</li></a>
        <a href="{{url('admin/msg/')}}"><li>查看留言</li></a>
    </ul>
</div>

<div id="openMenu">
    <div id="openMenuBefore"></div>
    <div id="openMenuAfter"></div>
</div>

<div id="closeMenu"></div>

<script type="text/javascript" src="{{url('admin/js/jquery-1.10.2.js')}}"></script>
<script type="text/javascript" src="{{url('admin/js/jquery.easing.1.3.js')}}"></script>
<script type="text/javascript" src="{{url('admin/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{url('admin/js/menu.js')}}"></script>
<script type="text/javascript" src="{{url('admin/js/content.js')}}"></script>
<script type="text/javascript" src="{{url('admin/js/slick.js')}}"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src='{{url('plugs/tinymce/js/tinymce/tinymce.min.js')}}'></script>
<script type="text/javascript" src="{{url('js/lightbox.js')}}"></script>


<script>
    //tinymce editor


    tinymce.init({
        selector: '.mcetextarea',
        height: 500,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste jbimages"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
        relative_urls: false
    });

    //check delete Modal
    function checkDel(giveUrl,id){

        var url=giveUrl;

        $('#checkModal').modal('show');

        $('#checkModal').modal().one('click', '#checkDel', function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })

            $.ajax({
                type: "DELETE",
                url: url + '/' + id,
                success: function (data) {
                    console.log(data);
                    location.reload();

                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

            $('#checkModal').modal('hide');
        });

    }
</script>

@yield('script')

</body>

</html>