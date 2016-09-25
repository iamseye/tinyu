@extends('admin.layouts.mainLayout')

@section('content')

    @include('admin.layouts._subMenuProducts')


    <div id="deatailArea">

        {!! Breadcrumbs::render($cate) !!}



        @include('layouts._errorMsg')

        <div id="deatail">

            <div class="table table1">
                <div class="table-row title">
                    <div class="table-cell">產品名稱</div>
                    <div class="table-cell">產品照片</div>
                    <div class="table-cell">上架時間</div>
                    <div class="table-cell">操作</div>
                </div>

                @foreach($products as $row)

                    <div class="table-row">
                        <div class="table-cell">
                            {{$row->name}}
                        </div>
                        <div class="table-cell">
                            @foreach($row->pathArray as $path)
                                <a href="{{URL::to($path) }}" data-lightbox="picture" >
                                {!! Html::image($path,$row->name,['class'=>'img-rounded']) !!}
                                </a>
                            @endforeach
                        </div>
                        <div class="table-cell">
                            {{$row->created_at}}
                        </div>
                        <div class="table-cell">
                            <a href="{{ url('admin/product/'.$row->id) }}"><input type="button" value="編輯" /></a>
                            <button class="btn btn-danger" onclick="checkDel('{{url('admin/product')}}','{{$row->id}}')" value="{{$row->id}}">刪除</button>

                        </div>
                    </div>

                @endforeach


            </div>

            @include('admin.layouts._pagination',['paginator' => $products])

        </div>
            @include('admin.layouts._del_check_modal')

    </div>

    <meta name="_token" content="{{ csrf_token() }}" />
@stop

