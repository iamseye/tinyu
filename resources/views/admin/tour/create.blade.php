@extends('admin.layouts.mainLayout')
@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

@stop
@section('content')


    <div id="deatailCorss">

        {!! Breadcrumbs::render('tours_add') !!}

        @include('layouts._errorMsg')

        <div id="deatail">

            {!! Form::open(['method'=>'POST', 'url'=>'admin/tour/','files' => 'true']) !!}

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
                        <div id="show_pic"></div>

                    </div>
                </div>
                @include('admin.layouts._tourFormTmp')

                <div class="table-row">
                    <div class="table-cell title">導覽時間類型</div>
                    <div class="table-cell">
                        {!! Form::radio('schedule_type', 'once',true) !!} 一次性
                        {!! Form::radio('schedule_type', 'regular') !!} 常態性
                    </div>
                </div>
                <!-- for once type -->
                <div id='once_tour' class="table-row">
                    <div class="table-cell title">導覽起始時間</div>
                    <div class="table-cell">
                        <div id="rangepick" class="row form-inline">
                            <div class="col-md-12 ">
                                {{ Form::text('once_tour_start_time', '', array('id' => 'tour_start_time','class'=>'form-control','placeholder'=>'開始時間'))}}
                                <span class="glyphicon glyphicon-arrow-right"></span>

                                {{ Form::text('once_tour_end_time', '', array('id' => 'tour_end_time','class'=>'form-control','placeholder'=>'結束時間')) }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- for regular type -->
                <div id='regular_tour_date' class="table-row">
                    <div class="table-cell title">導覽起始日期</div>
                    <div class="table-cell">
                        <div id="rangepickRegular" class="row form-inline">
                            <div class="col-md-8 ">
                                {{ Form::text('tour_start_time', '', array('id' => 'regular_tour_start_date','class'=>'form-control','placeholder'=>'開始日期'))}}
                                <span class="glyphicon glyphicon-arrow-right"></span>
                                {{ Form::text('tour_end_time', '', array('id' => 'regular_tour_end_date','class'=>'form-control','placeholder'=>'結束日期')) }}
                            </div>

                        </div>
                        <p  class="form-text text-muted">
                            所選日期內（包含）每星期皆會新增導覽
                        </p>
                    </div>
                </div>

                <div id='regular_tour_week' class="table-row">
                    <div class="table-cell title">導覽循環星期與時間</div>
                    <div class="table-cell">
                        <dvi class="row">
                            <button class="btn btn-success btn-add" type="button" id="addWeek">
                                <span class="glyphicon glyphicon-plus">新增星期</span>
                            </button>
                        </dvi>
                        <div id='addWeekArea' >
                            <div class="row form-inline">
                                <div class="col-sm-2">
                                    {!! Form::select('week[]', array('Monday' => '星期一', 'Tuesday' => '星期二','Wednesday' => '星期三','Thursday' => '星期四','Friday' => '星期五','Saturday' => '星期六','Sunday' => '星期日'),['class'=>'form-control']) !!}
                                </div>
                                <div class="col-md-4">
                                    {{ Form::time('start_time[]', '00:00:00', array('id' => 'start_time','class'=>'form-control','placeholder'=>'開始時間')) }}
                                    <span class="glyphicon glyphicon-arrow-right"></span>
                                    {{ Form::time('end_time[]', '00:00:00', array('id' => 'end_time','class'=>'form-control','placeholder'=>'開始時間')) }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end regular type -->

                <div class="table-row">
                    <div class="table-cell title">內容</div>
                    <div class="table-cell">
                        {!! Form::textArea('description', null,['class'=>'mcetextarea']) !!}
                    </div>
                </div>
            </div>


            <div class="buttonArea">
                {!! Form::submit('新增')!!}
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

        $("#regular_tour_week").hide();
        $("#regular_tour_date").hide();

        $("input[name='schedule_type']").change(function(){
            if ($(this).val() === 'regular') {
                $("#regular_tour_week").show();
                $("#regular_tour_date").show();
                $("#once_tour").hide();
            } else if ($(this).val() === 'once') {
                $("#once_tour").show();
                $("#regular_tour_week").hide();
                $("#regular_tour_date").hide();
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


    });
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