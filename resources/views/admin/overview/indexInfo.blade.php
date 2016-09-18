@extends('admin.layouts.mainLayout')

@section('content')


    @include('admin.layouts._subMenu')

    <div id="deatailArea">

        {!! Breadcrumbs::render('indexInfo') !!}

        @include('layouts._errorMsg')

        <div id="deatail">

            {!! Form::model($overview,['method'=>'PATCH', 'url'=>'admin/overview/indexInfo/update/'.$overview->id]) !!}

            <div class="table">
                <div class="table-row">
                    <div class="table-cell title">首頁影片</div>
                    <div class="table-cell">
                        {!! Form::text('video_path', null, ['placeholder'=>'請輸入YouTube影片網址']) !!}
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell title">首頁標題</div>
                    <div class="table-cell">
                        {!! Form::text('video_title', null,['placeholder'=>'請輸入標題']) !!}
                    </div>
                </div>

                <div class="table-row">
                    <div class="table-cell title">簡介</div>
                    <div class="table-cell">
                        {!! Form::textarea('video_content', null) !!}
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