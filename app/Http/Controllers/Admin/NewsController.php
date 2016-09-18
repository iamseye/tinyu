<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Traits\MsgTrait;
use App\News;
use App\Http\Requests\newsFormRequest;

class NewsController extends Controller
{
    use MsgTrait;
    //
    public function index()
    {
       return redirect('admin/news/cate/note');
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(newsFormRequest $request)
    {
        News::create($request->all());

        $category =$request->get('category');

        if($category=='taichung')
        {
            return redirect('admin/news/cate/taichung');
        }
        else
        {
            return redirect('admin/news/cate/note');
        }
    }

    public function show($id)
    {
        $news=News::findorFail($id);

        return view('admin.news.edit',compact('news'));
    }

    public function update(newsFormRequest $request, $id)
    {
        News::find($id)->update($request->all());

        $this->succMsg($request,'Data updated');

        $category =$request->get('category');

        if($category=='taichung')
        {
            return redirect('admin/news/cate/taichung');
        }
        else
        {
            return redirect('admin/news/cate/note');
        }
    }

    public function destroy($id, Request $request)
    {
        $task = News::destroy($id);

        $this->succMsg($request,'刪除成功');

        return Response()->json($task);
    }

    public function showCatePage($cate)
    {
        //TC記事
        if($cate=='note')
        {
            $news=News::where('category','note')->orderBy('created_at', 'desc')->paginate(10);
            $cate='note';
        }

        //taichung news
        else{
            $news=News::where('category','taichung')->orderBy('created_at', 'desc')->paginate(10);
            $cate='taichung';
        }

        return view('admin.news.index',compact('news','cate'));
    }
}
