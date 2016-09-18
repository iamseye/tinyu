@extends('admin.layouts.mainLayout')

@section('content')

    @include('admin.layouts._subMenuNews')


    <div id="deatailArea">

        @if($news->category=='note')
            {!! Breadcrumbs::render('note_edit') !!}
        @else
            {!! Breadcrumbs::render('taichung_edit') !!}

        @endif

        @include('layouts._errorMsg')

        <div id="deatail">

            {!! Form::model($news,['method'=>'PATCH', 'url'=>'admin/news/'.$news->id]) !!}

            @include('admin.layouts._newsFormTmp')

            <div class="buttonArea">
                {!! Form::submit('修改')!!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@stop