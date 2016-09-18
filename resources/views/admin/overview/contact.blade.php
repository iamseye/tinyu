@extends('admin.layouts.mainLayout')

@section('content')


    @include('admin.layouts._subMenu')

    <div id="deatailArea">

        {!! Breadcrumbs::render('contact') !!}

        @include('layouts._errorMsg')

        <div id="deatail">

            {!! Form::model($overview,['method'=>'PATCH', 'url'=>'admin/overview/contact/update/'.$overview->id]) !!}

            <div class="table">
                <div class="table-row">
                    <div class="table-cell title">聯絡電話</div>
                    <div class="table-cell">
                        {!! Form::text('contact_phone', null,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell title">Email</div>
                    <div class="table-cell">
                        {!! Form::email('contact_email', null,['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="table-row">
                    <div class="table-cell title">聯絡地址</div>
                    <div class="table-cell">
                        {!! Form::text('contact_add', null,['class'=>'form-control']) !!}
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