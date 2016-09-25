@extends('admin.layouts.mainLayout')

@section('css')

    <link rel="stylesheet" type="text/css" href="{{url('plugs/jQuery.filer-1.3.0/css/jquery.filer.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('plugs/jQuery.filer-1.3.0/css/themes/jquery.filer-dragdropbox-theme.css')}}">

@stop

@section('content')

    @include('admin.layouts._subMenuProducts')


    <div id="deatailArea">

        {!! Breadcrumbs::render('messages') !!}

        @include('layouts._errorMsg')

            <div id="deatail">

                {!! Form::open(['method'=>'POST', 'url'=>'admin/product/','files' => 'true']) !!}

                <div class="table">
                    @include('admin.layouts._productForm')
                    <div class="table-row">
                        <div class="table-cell title">上傳商品照片</div>
                        <div class="table-cell">
                            <input type="file" name="files[]" id="filer_input" multiple="multiple">
                        </div>
                    </div>

                    <div class="table-row" id="carousel">
                        <div class="table-cell title">上傳輪播照片</div>
                        <div class="table-cell">
                            <input type="file" name="carouselFiles[]" id="carousel_file" multiple="multiple">
                        </div>
                    </div>

                    <div class="table-row" id="area">
                        <div class="table-cell title">上傳額外欄位照片</div>
                        <div class="table-cell">
                            <input type="file" name="areaFiles[]" id="area_file" multiple="multiple">
                        </div>
                    </div>

                    @include('admin.layouts._productForm1')

                </div>


                <div class="buttonArea">
                    {!! Form::submit('新增')!!}
                </div>

                {!! Form::close() !!}

            </div>
    </div>
@stop

@section('script')
    <script type="text/javascript" src="{{url('plugs/jQuery.filer-1.3.0/js/jquery.filer.js')}}"></script>

    <script>
    $(document).ready(function() {

        $("#cate").change(function(){
            console.log('fds');
            if ($(this).val() == 1) {
                $("#carousel").show();
                $("#area").show();
            } else {
                $("#carousel").hide();
                $("#area").hide();
            }
        });


        $('#filer_input').filer({
            showThumbs: true,
            addMore: true,
            allowDuplicates: false
        });



        $('#carousel_file').filer({
            showThumbs: true,
            addMore: true,
            allowDuplicates: false
        });

        $('#area_file').filer({
            showThumbs: true,
            addMore: true,
            allowDuplicates: false
        });
    });
    </script>


@stop