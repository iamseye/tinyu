@extends('admin.layouts.mainLayout')

@section('css')
    <style>
        .img-rounded {
            width: 50px;
            height: 50px;
        }
    </style>
@stop

@section('content')

    @include('admin.layouts._subMenu')

    <div id="deatailArea">

        {!! Breadcrumbs::render('info') !!}

        @include('layouts._errorMsg')

        <div id="deatail">

            {!! Form::model($overview,['method'=>'PATCH', 'url'=>'admin/overview/info/update/'.$overview->id,'files' => 'true']) !!}

                <div class="table">
                    <div class="table-row">
                        <div class="table-cell title">網站關鍵字</div>
                        <div class="table-cell">
                            {!! Form::text('keyword', null, ['placeholder'=>'請輸入關鍵字，並以逗號隔開']) !!}
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell title">網站基本敘述</div>
                        <div class="table-cell">
                            {!! Form::textarea('description', null) !!}
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell title">Logo</div>
                        <div class="table-cell">
                            {!! Form::file('logo', null) !!}
                            {!! Html::image('images/logo.png','logo',['class'=>'img-rounded','id'=>'imgLogo']) !!}
                        </div>

                    </div>
                    <div class="table-row">
                        <div class="table-cell title">favicon</div>
                        <div class="table-cell">
                            {!! Form::file('favicon', null) !!}
                            {!! Html::image('images/favicon.ico','favicon',['class'=>'img-rounded','id'=>'imgFavicon']) !!}
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

@section('script')

    <script>

        $('input[name=logo]').change(function(){
            readURL(this,'imgLogo');
        });

        $('input[name=favicon]').change(function(){
            readURL(this,'imgFavicon');
        });

        function readURL(input,id) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+id).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

@stop