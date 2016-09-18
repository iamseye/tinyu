@extends('admin.layouts.mainLayout')

@section('content')


    <div id="deatailCorss">

        {!! Breadcrumbs::render('booking') !!}

        @include('layouts._errorMsg')

        <div id="deatail">

            <div class="search title">
                {!! Form::open(['method'=>'POST', 'url'=>'admin/booking/search']) !!}
                <div id="search" class="row form-inline">
                    <div class="col-lg-12">
                        {{Form::label('title', '導覽名稱關鍵字')}}
                        {{Form::text('title','',array('class'=>'form-control','id'=>'title','placeholder'=>'搜尋'))}}

                        {{Form::label('name', '姓名關鍵字')}}
                        {{Form::text('name','',array('class'=>'form-control','id'=>'title','placeholder'=>'搜尋'))}}

                        {!! Form::submit('搜尋')!!}
                    </div>
                </div>

                {{ Form::close() }}
            </div>

            <div class="table table1">
                <div class="table-row title">
                    <div class="table-cell">姓名</div>
                    <div class="table-cell">電話</div>
                    <div class="table-cell">預定導覽</div>
                    <div class="table-cell">預定時間</div>
                    <div class="table-cell">狀態</div>
                    <div class="table-cell">操作</div>
                </div>

                @foreach($bookings as $booking)

                    <div class="table-row">
                        <div class="table-cell">
                            {!! $booking->name !!}
                        </div>
                        <div class="table-cell">
                            {!! $booking->phone!!}
                        </div>
                        <div class="table-cell">
                            {!! $booking->name !!}
                        </div>
                        <div class="table-cell">
                            {!! $booking->created_at !!}
                        </div>
                        <div class="table-cell">
                            @if($booking->situation==1)
                                <span>處理中</span>
                            @elseif($booking->situation==2)
                                <span>已處理</span>
                            @else
                                <span>未處理</span>
                            @endif
                        </div>

                        <div class="table-cell">
                            <a href="{{url('admin/booking/'.$booking->id)}}"><input type="button" value="編輯" /></a>
                        </div>
                    </div>
                @endforeach



            </div>

            @include('admin.layouts._pagination',['paginator' => $bookings])

        </div>
    </div>
@stop
