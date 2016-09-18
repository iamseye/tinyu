@extends('admin.layouts.mainLayout')

@section('content')

    @include('admin.layouts._subMenuNews')


    <div id="deatailArea">

        {!! Breadcrumbs::render('messages') !!}

        @include('layouts._errorMsg')

            <div id="deatail">

                {!! Form::open(['method'=>'POST', 'url'=>'admin/news/']) !!}

                @include('admin.layouts._newsFormTmp')

                <div class="buttonArea">
                    {!! Form::submit('修改')!!}
                </div>

                {!! Form::close() !!}

            </div>
    </div>
@stop