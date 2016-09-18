

<div class="table-row">
    <div class="table-cell title">類型</div>
    <div class="table-cell">
        {!! Form::radio('tour_type', 'free',true) !!} 免費
        {!! Form::radio('tour_type', 'charge') !!} 付費
    </div>
</div>

<div id='price_column' class="table-row">
    <div class="table-cell title">價格</div>
    <div class="table-cell">
        {!! Form::number('price', 0,['class'=>'form-control']) !!}

    </div>
</div>

<div id='early_price_column' class="table-row">
    <div class="table-cell title">早鳥價格</div>
    <div class="table-cell">
        {!! Form::number('early_price', 0,['class'=>'form-control']) !!}
    </div>
</div>

<div class="table-row">
    <div class="table-cell title">人數</div>
    <div class="table-cell">
        {!! Form::number('peopleNum', 0,['class'=>'form-control','min'=>0]) !!}
    </div>
</div>

<div class="table-row">
    <div class="table-cell title">會面地點</div>
    <div class="table-cell">
        {!! Form::text('meeting_point', null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="table-row">
    <div class="table-cell title">導覽區域</div>
    <div class="table-cell">
        {!! Form::select('location_id', $items,['class'=>'form-control']) !!}
    </div>
</div>

