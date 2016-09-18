@extends('admin.layouts.mainLayout')

@section('content')



        <div id="deatailCorss">
            {!! Breadcrumbs::render('messages_detail') !!}

            <div id="deatail">
                <div class="table table1">
                    <div class="table-row">
                        <div class="table-cell title">時間</div>
                        <div class="table-cell">
                            {!! $msg->created_at !!}
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell title">姓名</div>
                        <div class="table-cell">
                            {!! $msg->name !!}
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell title">電話</div>
                        <div class="table-cell">
                            {!! $msg->phone !!}
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell title">信箱</div>
                        <div class="table-cell">
                            {!! $msg->email !!}
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell title">內容</div>
                        <div class="table-cell">
                            {!! strip_tags($msg->content) !!}
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell title">狀態</div>
                        <div class="table-cell">

                            {!! Form::open(['method'=>'PATCH', 'url'=>'admin/msg/'.$msg->id])!!}

                            @if($msg->status ==0)
                                {!! Form::radio('status', 0,true) !!}未處理
                                {!! Form::radio('status', 1) !!}處理中
                                {!! Form::radio('status', 2) !!}已處理

                            @elseif($msg->status==1)
                                {!! Form::radio('status', 0) !!}未處理
                                {!! Form::radio('status', 1, true) !!}處理中
                                {!! Form::radio('status', 2) !!}已處理
                            @else
                                {!! Form::radio('status', 0) !!}未處理
                                {!! Form::radio('status', 1) !!}處理中
                                {!! Form::radio('status', 2, true) !!}已處理

                            @endif

                            <div class="buttonArea">
                                {!! Form::submit('修改')!!}
                            </div>

                            {!! Form::close() !!}

                        </div>
                    </div>

                </div>
            </div>
        </div>

@stop