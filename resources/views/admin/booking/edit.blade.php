@extends('admin.layouts.mainLayout')


@section('content')

    <div id="deatailCorss">

        {!! Breadcrumbs::render('booking_detail') !!}

        @include('layouts._errorMsg')

        <div id="deatail">

            {!! Form::model($booking,['method'=>'PATCH', 'url'=>'admin/booking/'.$booking->id]) !!}

            <div class="table">
                <div class="table-row">
                    <div class="table-cell title">姓名</div>
                    <div class="table-cell">
                        {!! $booking->name!!}
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell title">預定導覽</div>
                    <div class="table-cell">
                        {!! $booking->tour_title !!}
                    </div>

                </div>
                <div class="table-row">
                    <div class="table-cell title">電話</div>
                    <div class="table-cell">
                        {!! $booking->phone !!}
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell title">信箱</div>
                    <div class="table-cell">
                        {!! $booking->email !!}
                    </div>

                </div>
                <div class="table-row">
                    <div class="table-cell title">年紀</div>
                    <div class="table-cell">
                        {!! $booking->age_range!!}
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell title">國籍</div>
                    <div class="table-cell">
                        {!! $booking->nationality!!}
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell title">預定時間</div>
                    <div class="table-cell">
                        {!! $booking->created_at !!}
                    </div>
                </div>

                @if($booking->tour_type=='charge')
                <div class="table-row">
                    <div class="table-cell title">付款狀態</div>
                    <div class="table-cell">
                        @if($booking->paid ==0)
                            {!! Form::radio('paid', 0,true) !!}未付款
                            {!! Form::radio('paid', 1) !!}已付款
                        @else
                            {!! Form::radio('paid', 0) !!}未付款
                            {!! Form::radio('paid', 1,true) !!}已付款
                        @endif
                    </div>
                </div>
                @endif
                <div class="table-row">
                    <div class="table-cell title">狀態</div>
                    <div class="table-cell">
                        @if($booking->situation ==0)
                        {!! Form::radio('situation', 0,true) !!}未處理
                        {!! Form::radio('situation', 1) !!}處理中
                        {!! Form::radio('situation', 2) !!}已處理

                        @elseif($booking->status==1)
                        {!! Form::radio('situation', 0) !!}未處理
                        {!! Form::radio('situation', 1, true) !!}處理中
                        {!! Form::radio('situation', 2) !!}已處理
                        @else
                        {!! Form::radio('situation', 0) !!}未處理
                        {!! Form::radio('situation', 1) !!}處理中
                        {!! Form::radio('situation', 2, true) !!}已處理
                        @endif
                    </div>

                </div>

            </div>
            <div class="buttonArea">
                {!! Form::submit('修改')!!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@stop
