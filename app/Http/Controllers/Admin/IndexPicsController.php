<?php

namespace App\Http\Controllers\Admin;

use App\IndexPics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\MsgTrait;
use Illuminate\Support\Facades\File;

use App\Http\Requests;

class IndexPicsController extends Controller
{
    use MsgTrait;

    public function index()
    {
        $pics = IndexPics::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.overview.indexPic', compact('pics'));
    }

    //using ajax to return and store new record
    public function store(Requests\IndexPicsRequest $request)
    {
        //create row
        $task = IndexPics::create($request->all());
        $id = $task->id;

        //upload files
        $file = $request->file('path');

        if ($file->isValid()) {
            $extension = $file->getClientOriginalExtension();
            $fileName = $id . '.' . $extension;
            $destinationPath = base_path() . '/public/images/indexPics';
            $file->move($destinationPath, $fileName);

            //update save_path
            $newRow = IndexPics::findOrFail($id);

            $newRow->path = 'images/indexPics/' . $fileName;
            $newRow->save();

            $this->succMsg($request, '新增資訊成功');
            return Response()->json($task);
        } else {
            $this->failMsg($request, '檔案內容錯誤！');
            return Response()->json(array(
                'success' => false,
                'errors' => '檔案內容錯誤'
            ), 400); // 400 being the HTTP code for an invalid request.
        }

    }

    public function destroy($id,Request $request)
    {
        $file = $newRow = IndexPics::findOrFail($id);

        if (File::exists($file->path)) {
            File::delete($file->path);
        }

        $task = IndexPics::destroy($id);

        $this->succMsg($request,'刪除成功');

        return Response()->json($task);
    }
}
