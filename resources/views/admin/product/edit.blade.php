@extends('admin.layouts.mainLayout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('plugs/jQuery.filer-1.3.0/css/jquery.filer.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('plugs/jQuery.filer-1.3.0/css/themes/jquery.filer-dragdropbox-theme.css')}}">
@stop

@section('content')

    @include('admin.layouts._subMenuProducts')


    <div id="deatailArea">

        {!! Breadcrumbs::render('messages') !!}

        @include('layouts._errorMsg')

        <div id="deatail">

            {!! Form::model($product,['method'=>'PATCH', 'url'=>'admin/product/'.$product->id,'files'=>'true']) !!}

            <div class="table">
                @include('admin.layouts._productForm')

                <div class="table-row">
                    <div class="table-cell title">編輯商品照片</div>
                    <div class="table-cell">
                        <input type="file" name="files[]" id="filer_input" multiple="multiple">

                        @foreach($pics as $pic)
                            <div class="'row">
                                <div class = "col-sm-6 col-md-3">
                                    <div class = "thumbnail">
                                        <a href="{{URL::to($pic->path) }}" data-lightbox="picture" >
                                            {!! Html::image($pic->path,null) !!}
                                        </a>
                                    </div>

                                    <div class = "caption">

                                        <p>
                                            <a href = "#" class = "btn btn-danger delete-item" role = "button" picId="{{$pic->id}}">
                                                刪除
                                            </a>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                @if($product->category==1)
                <div class="table-row">
                    <div class="table-cell title">編輯輪播照片</div>
                    <div class="table-cell">
                        <input type="file" name="carouselFiles[]" id="carousel_file" multiple="multiple">

                        @foreach($carouselPics as $pic)
                            <div class="'row">
                                <div class = "col-sm-6 col-md-3">
                                    <div class = "thumbnail">
                                        <a href="{{URL::to($pic->path) }}" data-lightbox="picture" >
                                            {!! Html::image($pic->path,null) !!}
                                        </a>
                                    </div>

                                    <div class = "caption">

                                        <p>
                                            <a href = "#" class = "btn btn-danger delete-item" role = "button" picId="{{$pic->id}}" picType="carousel">
                                                刪除
                                            </a>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="table-row">
                    <div class="table-cell title">編輯額外欄位照片</div>
                    <div class="table-cell">
                        <input type="file" name="areaFiles[]" id="area_file" multiple="multiple">

                        @foreach($areaPics as $pic)
                            <div class="'row">
                                <div class = "col-sm-6 col-md-3">
                                    <div class = "thumbnail">
                                        <a href="{{URL::to($pic->path) }}" data-lightbox="picture" >
                                            {!! Html::image($pic->path,null) !!}
                                        </a>
                                    </div>

                                    <div class = "caption">
                                        <p>
                                            <a href = "#" class = "btn btn-danger delete-item" role = "button" picId="{{$pic->id}}" picType="area">
                                                刪除
                                            </a>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
                @include('admin.layouts._productForm1')
            </div>

            <div class="buttonArea">
                {!! Form::submit('修改')!!}
            </div>

            {!! Form::close() !!}
            <meta name="_token" content="{{ csrf_token() }}" />

        </div>
    </div>
@stop

@include('admin.layouts._del_check_modal')

@section('script')

    <script type="text/javascript" src="{{url('plugs/jQuery.filer-1.3.0/js/jquery.filer.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#filer_input').filer({
                showThumbs: true,
                addMore: true,
                allowDuplicates: false
            });

            $('#carousel_file').filer({
                showThumbs: true,
                addMore: true,
                allowDuplicates: false
            });

            $('#area_file').filer({
                showThumbs: true,
                addMore: true,
                allowDuplicates: false
            });

            $('.delete-item').click(function(e){

                var id = $(this).attr('picId');
                var target = $(this);

                var url='{{url('admin/productPics')}}';

                if($(this).attr('picType')=='carousel')
                {
                    url='{{url('admin/carouselPicDel')}}';
                }
                else if($(this).attr('picType')=='area')
                {
                    url='{{url('admin/areaPicDel')}}';
                }

                $('#checkModal').modal('show');

                $('#checkModal').modal().one('click', '#checkDel', function () {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "DELETE",
                        url: url +'/'+ id,
                        success: function (data) {
                            target.closest('.col-md-3').fadeOut();
                            console.log(data);
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });

                    $('#checkModal').modal('hide');
                });

            });

            $('.set-main').click(function(e){

                var id = $(this).attr('picId');
                var target = $(this);

                console.log(id);

                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                });

                $.ajax({
                    type: "POST",
                    url: '{{url('admin/productPics/update_main')}}' +'/'+ id,
                    success: function (data) {
                        target.text('主要圖片');
                        console.log(data);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });

                $('#checkModal').modal('hide');

            });

        });
    </script>

@stop