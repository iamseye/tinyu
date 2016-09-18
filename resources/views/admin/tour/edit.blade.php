@extends('admin.layouts.mainLayout')
@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <style>
        .img-rounded {
            width: 100px;
            height: 100px;
        }
    </style>
@stop
@section('content')


    <div id="deatailCorss">

        {!! Breadcrumbs::render('tours_edit') !!}

        @include('layouts._errorMsg')

        <div id="deatail">

            {!! Form::model($tour,['method'=>'PATCH', 'url'=>'admin/tour/'.$tour->id,'files' => 'true']) !!}

            <div class="table">
                <div class="table-row">
                    <div class="table-cell title">導覽名稱</div>
                    <div class="table-cell">
                        {!! Form::text('title', null,['placeholder'=>'請輸入導覽名稱','class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell title">圖片</div>
                    <div class="table-cell">
                        {!! Form::file('picture', null,['class'=>'form-control-file']) !!}
                        {!! Html::image('images/tours/'.$tour->picture,'imgPic',['class'=>'img-rounded','id'=>'img']) !!}
                    </div>
                </div>
            @include('admin.layouts._tourFormTmp')

                <!-- for once type -->
                    <div id='once_tour' class="table-row">
                        <div class="table-cell title">導覽起始時間</div>
                        <div class="table-cell">
                            <div id="rangepick" class="row form-inline">
                                <div class="col-md-12 ">
                                    {{ Form::text('tour_start_time', date('Y-m-d H:i',strtotime($tour->tour_start_time)), array('id' => 'tour_start_time','class'=>'form-control'))}}
                                    <span class="glyphicon glyphicon-arrow-right"></span>

                                    {{ Form::text('tour_end_time', date('Y-m-d H:i',strtotime($tour->tour_end_time)), array('id' => 'tour_end_time','class'=>'form-control')) }}
                                </div>
                            </div>
                        </div>
                    </div>


                <div class="table-row">
                    <div class="table-cell title">內容</div>
                    <div class="table-cell">
                        {!! Form::textArea('description', null,['class'=>'mcetextarea']) !!}
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell title">強制下架</div>
                    <div class="table-cell">
                        {!! Form::radio('offShelf', 0, true)!!}否
                        {!! Form::radio('offShelf', 1)!!}是
                    </div>
                </div>
            </div>

            <div class="buttonArea">
                {!! Form::submit('更新')!!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@stop


@section('script')

    <script type="text/javascript" src="{{url('js/jquery-3.1.0.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/moment.js')}}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <script type="text/javascript" src="{{url('js/jsrender.min.js')}}"></script>


    <script>
        $( document ).ready(function() {
            $("#price_column").hide();
            $("#early_price_column").hide();


            $("input[name='tour_type']").change(function(){
                if ($(this).val() === 'charge') {
                    $("#price_column").show();
                    $("#early_price_column").show();
                } else if ($(this).val() === 'free') {
                    $("#price_column").hide();
                    $("#early_price_column").hide();
                }
            });


            $('#addWeek').click(function(){
                var tmpl = $.templates("#myTmpl"); // Get compiled template
                $("#addWeekArea").append(tmpl);
            });


            //-- datepicker ---

            $('#rangepick').daterangepicker({
                "timePicker": true,
                "locale": {
                    "format": "YYYY-MM-DD",
                }
            }, function(start, end, label) {
                console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");

                $('#tour_start_time').val(start.format('YYYY-MM-DD HH:mm'));
                $('#tour_end_time').val(end.format('YYYY-MM-DD HH:mm'));

            });

            $('#rangepickRegular').daterangepicker({
                "locale": {
                    "format": "YYYY-MM-DD",
                }
            }, function(start, end, label) {
                console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");

                $('#regular_tour_start_date').val(start.format('YYYY-MM-DD'));
                $('#regular_tour_end_date').val(end.format('YYYY-MM-DD'));

            });

            //-- end datepicker ---

            $('input[name=picture]').change(function(){
                readURL(this,'img');
            });

    });

        function readURL(input,id) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+id).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <!-- Declare a JsRender template, in a script block: -->
    <script id="myTmpl" type="text/x-jsrender">
<div class="row form-inline">
    <div class="col-sm-2">
     {!! Form::select('week[]', array('Mon' => '星期一', 'Ｔue' => '星期二','Wed' => '星期三','Thu' => '星期四','Fri' => '星期五','Sat' => '星期六','Sun' => '星期日'),['class'=>'form-control']) !!}
        </div>
        <div class="col-md-4">
            {{ Form::time('start_time[]', '00:00:00', array('id' => 'start_time','class'=>'form-control','placeholder'=>'開始時間')) }}
        <span class="glyphicon glyphicon-arrow-right"></span>
        {{ Form::time('end_time[]', '00:00:00', array('id' => 'end_time','class'=>'form-control','placeholder'=>'開始時間')) }}
        </div>

    </div>
    </script>

@stop
