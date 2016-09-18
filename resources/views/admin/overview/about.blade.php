@extends('admin.layouts.mainLayout')

@section('content')


    @include('admin.layouts._subMenu')

    <div id="deatailArea">

        {!! Breadcrumbs::render('about') !!}

        @include('layouts._errorMsg')

        <div id="deatail">

            {!! Form::model($overview,['method'=>'PATCH', 'url'=>'admin/overview/about/update/'.$overview->id]) !!}

            <div class="table">
                <div class="table-row">
                    <div class="table-cell title">理念故事</div>
                    <div class="table-cell">
                        {!! Form::textArea('about', null,['class'=>'mcetextarea']) !!}
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell title">團隊成員</div>
                    <div class="table-cell">
                        {!! Form::textArea('about_team_intro', null,['class'=>'mcetextarea']) !!}
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