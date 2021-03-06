<?php

// index
Breadcrumbs::register('index', function($breadcrumbs)
{
    $breadcrumbs->push('後台首頁', url('admin'));
});

//----overview

// Index > Overview
Breadcrumbs::register('overview', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('頁面資訊', url('admin/overview'));
});

// Index > Overview > info
Breadcrumbs::register('info', function($breadcrumbs)
{
    $breadcrumbs->parent('overview');
    $breadcrumbs->push('網頁資訊', url('admin/overview/info'));
});

// Index > Overview > indexInfo
Breadcrumbs::register('indexInfo', function($breadcrumbs)
{
    $breadcrumbs->parent('overview');
    $breadcrumbs->push('首頁', url('admin/overview/indexInfo'));
});

// Index > Overview > info
Breadcrumbs::register('about', function($breadcrumbs)
{
    $breadcrumbs->parent('overview');
    $breadcrumbs->push('關於我們', url('admin/overview/about'));
});

// Index > Overview > info
Breadcrumbs::register('contact', function($breadcrumbs)
{
    $breadcrumbs->parent('overview');
    $breadcrumbs->push('聯絡資訊');
});


//----news

// Index > News

Breadcrumbs::register('news', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('最新消息', url('admin/news/cate/note'));
});

// Index > News > note

Breadcrumbs::register('note', function($breadcrumbs)
{
    $breadcrumbs->parent('news');
    $breadcrumbs->push('最新消息',url('admin/news/cate/note'));
});

// Index > News > note > edit

Breadcrumbs::register('note_edit', function($breadcrumbs)
{
    $breadcrumbs->parent('note');
    $breadcrumbs->push('編輯消息');
});

// Index > News > taichung

Breadcrumbs::register('taichung', function($breadcrumbs)
{
    $breadcrumbs->parent('news');
    $breadcrumbs->push('優惠消息',url('admin/news/cate/taichung'));
});

// Index > News > taichung > edit

Breadcrumbs::register('taichung_edit', function($breadcrumbs)
{
    $breadcrumbs->parent('taichung');
    $breadcrumbs->push('編輯優惠消息');
});

//----messages

// Index > Ｍessages

Breadcrumbs::register('messages', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('查看留言', url('admin/msg'));
});

// Index > Ｍessages > detail

Breadcrumbs::register('messages_detail', function($breadcrumbs)
{
    $breadcrumbs->parent('messages');
    $breadcrumbs->push('留言內容');
});

//--proudct


Breadcrumbs::register('product', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('作品管理', url('admin/product/cate/1'));
});

// Index > proudct > 木屋

Breadcrumbs::register('1', function($breadcrumbs)
{
    $breadcrumbs->parent('product');
    $breadcrumbs->push('木屋');
});

// Index > proudct > 木屋

Breadcrumbs::register('2', function($breadcrumbs)
{
    $breadcrumbs->parent('product');
    $breadcrumbs->push('材料');
});

// Index > proudct > 木屋

Breadcrumbs::register('3', function($breadcrumbs)
{
    $breadcrumbs->parent('product');
    $breadcrumbs->push('家具');
});

// Index > proudct > 木屋

Breadcrumbs::register('4', function($breadcrumbs)
{
    $breadcrumbs->parent('product');
    $breadcrumbs->push('工程');
});