@extends('admin.layouts.mainLayout')


@section('content')

    @include('admin.layouts._subMenu')


    <div id="deatailArea">

        @include('layouts._errorMsg')

        <div id="deatail">

            <a><input type="button" id="btn-add" value="＋新增圖片 " /></a>

            <div class="table table1">
                <div class="table-row title">
                    <div class="table-cell">標題</div>
                    <div class="table-cell">內容</div>
                    <div class="table-cell">新增時間</div>
                    <div class="table-cell">操作</div>
                </div>

                @foreach($pics as $row)
                    <div class="table-row">
                        <div class="table-cell">
                            {{$row->name}}
                        </div>
                        <div class="table-cell">
                            <a href="{{URL::to('/'.$row->path) }}" data-lightbox="picture">
                                {!! Html::image($row->path,null,['class'=>'img-rounded']) !!}
                            </a>
                        </div>
                        <div class="table-cell">
                            {{$row->created_at}}
                        </div>
                        <div class="table-cell">
                            <button class="btn btn-danger" onclick="checkDel('{{url('admin/indexPics')}}','{{$row->id}}')" value="{{$row->id}}">刪除</button>
                        </div>
                    </div>
                @endforeach


            </div>

            @include('admin.layouts._pagination',['paginator' => $pics])

        </div>
        @include('admin.layouts._del_check_modal')

       <!-- Modal (Pop up when detail button clicked) -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">編輯資訊</h4>
                    </div>
                    <div class="modal-body">

                        {!! Form::open(array('id'=>'addForm','name'=>'addForm','class'=>'form-horizontal', 'url'=>'admin/indexPics','files' => 'true') ) !!}
                        <div class="form-group error">
                            <label for="title" class="col-sm-2 control-label">標題</label>
                            <div class="col-sm-10">
                                {!! Form::text('name',null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('path','圖片',array('class'=>'col-sm-2 control-label'))!!}
                            <div class="col-sm-4">
                                {!! Form::file('path', null,array('class'=>'form-control')) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary"  id="btn-save" value="add">新增</button>
                    </div>
                </div>
            </div>
        </div>
        <!--end of Modal -->


    </div>

    <meta name="_token" content="{{ csrf_token() }}" />
@stop

@section('script')
    <script>
    $(document).ready(function(){

        //display modal form for creating new task
        $('#btn-add').click(function(){
            $('#addForm').trigger("reset");
            $('#myModal').modal('show');
        });

        $('#btn-save').click(function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })

            e.preventDefault();

            var type = "POST"; //for creating new resource

            var form = document.getElementById('addForm');
            var formData=new FormData(form);

            //console.log(type+ ' '+ my_url);

            $.ajax({
                type: type,
                url: '/admin/indexPics',
                data: formData,
                processData: false,
                contentType:false,
                dataType: 'json',
                success: function (data) {

                    console.log(data);

                    location.reload();

                    $('#addForm').trigger("reset");

                    $('#myModal').modal('hide')
                },
                error: function (data) {
                    console.log('Error:', data);
                    location.reload();

                }
            });
        });
    });
    </script>
@stop

