<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

use App\Http\Requests;

class NewsController extends Controller
{
    //
    public  function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(10);

        return view('front.news_list',compact('news'));
    }

    public function show($id)
    {

        $news = News::findOrFail($id);

        return view('front.news_detail',compact('news'));

    }
}
