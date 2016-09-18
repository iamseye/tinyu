@extends('admin.layouts.mainLayout')

@section('content')


    <div id="deatailCorss">

        {!! Breadcrumbs::render('messages') !!}

        @include('layouts._errorMsg')

        <div id="deatail">
            <div class="table table1">
                <div class="table-row title">
                    <div class="table-cell">時間</div>
                    <div class="table-cell">姓名</div>
                    <div class="table-cell">內容預覽</div>
                    <div class="table-cell">狀態</div>
                    <div class="table-cell">詳細</div>
                </div>

                @foreach($msgs as $msg)

                    <div class="table-row">
                        <div class="table-cell">
                            {!! $msg->created_at !!}
                        </div>
                        <div class="table-cell">
                            {!! $msg->name !!}
                        </div>
                        <div class="table-cell">
                            <p>
                            {!! str_limit(strip_tags($msg->content), $limit = 100, $end = '...')  !!}
                            </p>
                        </div>
                        <div class="table-cell">
                         @if($msg->status ==1)
                                <span class="label label-warning">處理中</span>
                         @elseif($msg->status==2)
                                <span class="label label-success">已處理</span>
                         @else
                                <span class="label label-danger">未處理</span>
                         @endif
                        </div>
                        <div class="table-cell">
                            <a href="{{url('admin/msg/'.$msg->id)}}"><input type="button" value="細節" /></a>
                        </div>
                    </div>

                @endforeach



            </div>

            @include('admin.layouts._pagination',['paginator' => $msgs])

        </div>
    </div>
@stop