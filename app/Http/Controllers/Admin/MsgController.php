<?php

namespace App\Http\Controllers\Admin;

use App\Http\Traits\MsgTrait;
use App\Messages;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MsgController extends Controller
{
    use MsgTrait;
    //
    public function index()
    {
        $msgs=Messages::orderBy('status', 'asc')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.msg.index',compact('msgs'));
    }

    public function show($id)
    {
        $msg=Messages::findorFail($id);

        return view('admin.msg.show',compact('msg'));
    }

    public function update(Request $request, $id)
    {
        $msg=Messages::find($id);
        $msg->status=$request->get('status');
        $msg->save();

        $this->succMsg($request,'Data updated');

        return redirect('admin/msg');
    }
}
