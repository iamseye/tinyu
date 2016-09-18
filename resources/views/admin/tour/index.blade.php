@extends('admin.layouts.mainLayout')
@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

@stop
@section('content')


    <div id="deatailCorss">

        {!! Breadcrumbs::render('tours') !!}

        @include('layouts._errorMsg')

        <div id="deatail">

            <a href="{{url('admin/tour/create/')}}"><input type="button" id="add" value="＋新增導覽 " /></a>

            <div class="search title">
                {!! Form::open(['method'=>'POST', 'url'=>'admin/tour/search']) !!}
                <div id="search" class="row form-inline">
                    <div class="col-lg-12">
                        {{Form::label('title', '導覽名稱關鍵字')}}
                        {{Form::text('title','',array('class'=>'form-control','id'=>'title','placeholder'=>'搜尋'))}}

                        {{Form::label('schedule_type', '導覽類型')}}
                        {{Form::select('schedule_type', array(''=>'請選擇','regular' => '常態', 'once' => '一次')) }}

                        {{Form::label('tour_type', '收費方式')}}
                        {{Form::select('tour_type', array(''=>'請選擇','free' => '免費', 'charge' => '付費')) }}

                        {{Form::label('range_dates', '導覽區間')}}
                        {{ Form::text('range_dates', null, array('id' => 'range_dates','class'=>'form-control','placeholder'=>'請選擇'))}}
                        {!! Form::submit('搜尋')!!}
                    </div>
                </div>

                {{ Form::close() }}
            </div>

            <div class="table table1">
                <div class="table-row title">
                    <div class="table-cell">導覽名稱</div>
                    <div class="table-cell">導覽類型</div>
                    <div class="table-cell">收費方式</div>
                    <div class="table-cell">導覽開始時間</div>
                    <div class="table-cell">導覽結束時間</div>
                    <div class="table-cell">狀態</div>
                    <div class="table-cell">操作</div>
                </div>

                @foreach($tours as $tour)

                    <div class="table-row">
                        <div class="table-cell">
                            {!! $tour->title !!}
                        </div>
                        <div class="table-cell">
                            {!! $tour->schedule_type !!}
                        </div>
                        <div class="table-cell">
                            {!! $tour->tour_type !!}
                        </div>
                        <div class="table-cell">
                            {!! $tour->tour_start_time !!}
                        </div>
                        <div class="table-cell">
                            {!! $tour->tour_end_time !!}
                        </div>
                        <div class="table-cell">
                            @if($tour->offShelf==1 || $tour->tour_end_time <  Carbon\Carbon::now())
                                <span>已下架</span>
                            @else
                                <span>上架中</span>
                            @endif
                        </div>
                        <div class="table-cell">
                            <a href="{{url('admin/tour/'.$tour->id)}}"><input type="button" value="編輯" /></a>
                            <a href="{{url('admin/tour/booking/'.$tour->id)}}"><input type="button" value="預約名單" /></a>
                        </div>
                    </div>
                @endforeach



            </div>

            @include('admin.layouts._pagination',['paginator' => $tours])

        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript" src="{{url('js/jquery-3.1.0.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/moment.js')}}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <script>

        $( document ).ready(function() {
            $('#range_dates').daterangepicker({
                autoUpdateInput: false,
                "locale": {
                    "format": "YYYY-MM-DD",
                }
            }, function(start, end, label) {
                console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");

            });

            $('#range_dates').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' ~ ' + picker.endDate.format('YYYY-MM-DD'));
            });

            $('#range_dates').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        });
        </script>

@stop