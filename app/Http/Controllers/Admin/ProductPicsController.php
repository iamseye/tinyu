<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\ProductPics;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;


class ProductPicsController extends Controller
{
    //
    public function update_main($id)
    {
        $pic=ProductPics::find($id);
        $product_id=$pic->product_id;

        $product_pitures=Product::find($product_id)->productPics;

        foreach($product_pitures as $product_pic)
        {
            $pics=ProductPics::find($product_pic->id);
            $pics->main=0;
            $pics->save();
        }

        $pic->main=1;
        $pic->save();

        return Response()->json($pic);
    }

    public function destroy($id)
    {
        $picture = ProductPics::findOrFail($id);

        $test=File::delete($picture->path);
        //dd(test);
        $task = ProductPics::destroy($id);

        return Response()->json($task);
    }
}
