@extends('admin.layouts.mainLayout')

@section('content')

    @include('admin.layouts._subMenuNews')


    <div id="deatailArea">

        @if($cate=='note')
            {!! Breadcrumbs::render('note') !!}
        @else
            {!! Breadcrumbs::render('taichung') !!}

        @endif

        @include('layouts._errorMsg')

        <div id="deatail">

            <div class="table table1">
                <div class="table-row title">
                    <div class="table-cell">時間</div>
                    <div class="table-cell">標題</div>
                    <div class="table-cell">內容</div>
                    <div class="table-cell">操作</div>
                </div>

                @foreach($news as $row)

                    <div class="table-row">
                        <div class="table-cell">
                            {{$row->created_at}}
                        </div>
                        <div class="table-cell">
                            {{$row->title}}
                        </div>
                        <div class="table-cell">
                            {!! str_limit(strip_tags($row->content), $limit = 100, $end = '...')  !!}
                        </div>
                        <div class="table-cell">
                            <a href="{{ url('admin/news/'.$row->id) }}"><input type="button" value="編輯" /></a>
                            <button class="btn btn-danger" onclick="checkDel('{{url('admin/news')}}','{{$row->id}}')" value="{{$row->id}}">刪除</button>

                        </div>
                    </div>

                @endforeach


            </div>

            @include('admin.layouts._pagination',['paginator' => $news])

        </div>
            @include('admin.layouts._del_check_modal')

    </div>

    <meta name="_token" content="{{ csrf_token() }}" />
@stop

