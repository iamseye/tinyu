<?php

namespace App\Http\Controllers;

use App\Http\Traits\MsgTrait;
use App\IndexPics;
use App\Messages;
use App\Overview;
use Illuminate\Http\Request;

use App\Http\Requests;

class InfoController extends Controller
{
    use MsgTrait;
    //
    public  function about()
    {
        $overview=Overview::all()->first();

        $about=$overview->about;

        return view('front.about',compact('about'));
    }

    public function contact()
    {
        $overview=Overview::all()->first();

        return view('front.message',compact('overview'));
    }

    public function message(Requests\MsgRequest $request)
    {
        Messages::create($request->all());

        $this->succMsg($request,'已新增留言');

        return redirect('/contact');
    }
}
