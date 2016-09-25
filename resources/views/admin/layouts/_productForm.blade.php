
    <div class="table-row">
        <div class="table-cell title">產品名稱</div>
        <div class="table-cell">
            {!! Form::text('name', null,['placeholder'=>'請輸入標題']) !!}
        </div>
    </div>
    <div class="table-row">
        <div class="table-cell title">英文產品名稱</div>
        <div class="table-cell">
            {!! Form::text('eng_name', null,['placeholder'=>'請輸入標題']) !!}
        </div>
    </div>

    <div class="table-row">
        <div class="table-cell title">分類</div>
        <div class="table-cell">
            {{
                Form::select('category', array(1 => '木屋', 2=> '材料',3=>'家具',4=>'工程'),null,['id'=>'cate'])
            }}
        </div>
    </div>



