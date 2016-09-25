<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\productRequest;
use App\Http\Traits\MsgTrait;
use App\Product;
use App\ProductAreaPic;
use App\ProductCarousel;
use App\ProductPics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    //
    use MsgTrait;
    //
    public function index()
    {
        return redirect('admin/product/cate/1');
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(productRequest $request)
    {
        $product=Product::create($request->all());

        //------handle files array -------
        $id=$product->id;
        $files =  Input::file('files');

        if($files[0]!=null)
        {
            foreach($files as $file) {

                $pic=productPics::create([
                    'product_id'=>$id
                ]);

                $pic_id=$pic->id;

                $destinationPath = base_path() . '/public/images/products/p_'.$id;

                //create folder
                if(!File::exists($destinationPath)) {
                    //path does not exist
                    File::makeDirectory($destinationPath, $mode = 0777, true, true);
                }

                $extension=$file->getClientOriginalExtension();
                $fileName = 'product'.$id.'_'.$pic_id.'.'.$extension;
                $file->move($destinationPath,$fileName);

                $pic->path='/images/products/p_'.$id.'/'.$fileName;
                $pic->save();

            }
        }

        //木屋
        if($request->get('category')==1)
        {
            $carouselfiles =  $request->file('carouselFiles');

            if($carouselfiles[0]!=null)
            {
                foreach($carouselfiles as $file) {

                    $pic=ProductCarousel::create([
                        'product_id'=>$id
                    ]);

                    $pic_id=$pic->id;

                    $destinationPath = base_path() . '/public/images/products/p_'.$id;

                    //create folder
                    if(!File::exists($destinationPath)) {
                        //path does not exist
                        File::makeDirectory($destinationPath, $mode = 0777, true, true);
                    }

                    $extension=$file->getClientOriginalExtension();
                    $fileName = 'product'.$id.'_carousel_'.$pic_id.'.'.$extension;
                    $file->move($destinationPath,$fileName);

                    $pic->path='/images/products/p_'.$id.'/'.$fileName;
                    $pic->save();

                }
            }

            $areafiles =  $request->file('areaFiles');

            if($areafiles[0]!=null)
            {
                foreach($areafiles as $file) {

                    $pic=ProductAreaPic::create([
                        'product_id'=>$id
                    ]);

                    $pic_id=$pic->id;

                    $destinationPath = base_path() . '/public/images/products/p_'.$id;

                    //create folder
                    if(!File::exists($destinationPath)) {
                        //path does not exist
                        File::makeDirectory($destinationPath, $mode = 0777, true, true);
                    }

                    $extension=$file->getClientOriginalExtension();
                    $fileName = 'product'.$id.'_area_'.$pic_id.'.'.$extension;
                    $file->move($destinationPath,$fileName);

                    $pic->path='/images/products/p_'.$id.'/'.$fileName;
                    $pic->save();
                }
            }
        }
        //------ end of files array ------
        $category =$request->get('category');

        return redirect('admin/product/cate/'.$category);

    }

    public function show($id)
    {
        $product=Product::findorFail($id);

        $pics = Product::find($id)->productPics;

        $carouselPics='';
        $areaPics='';

        if($product->category==1)
        {
            $carouselPics = Product::find($id)->productCarousels;
            $areaPics = Product::find($id)->productAreaPics;
        }

        return view('admin.product.edit',compact('product','pics','carouselPics','areaPics'));
    }

    public function update(productRequest $request, $id)
    {
        Product::find($id)->update($request->all());

        //------handle files array -------
        $files =  Input::file('files');

        if($files[0]!=null)
        {
            foreach($files as $file) {

                $pic=productPics::create([
                    'product_id'=>$id
                ]);

                $pic_id=$pic->id;

                $destinationPath = base_path() . '/public/images/products/p_'.$id;

                //create folder
                if(!File::exists($destinationPath)) {
                    //path does not exist
                    File::makeDirectory($destinationPath, $mode = 0777, true, true);
                }

                $extension=$file->getClientOriginalExtension();
                $fileName = 'product'.$id.'_'.$pic_id.'.'.$extension;
                $file->move($destinationPath,$fileName);

                $pic->path='/images/products/p_'.$id.'/'.$fileName;
                $pic->save();

            }
        }


        //木屋
        if($request->get('category')==1)
        {
            $carouselfiles =  $request->file('carouselFiles');

            if($carouselfiles[0]!=null)
            {
                foreach($carouselfiles as $file) {

                    $pic=ProductCarousel::create([
                        'product_id'=>$id
                    ]);

                    $pic_id=$pic->id;

                    $destinationPath = base_path() . '/public/images/products/p_'.$id;

                    //create folder
                    if(!File::exists($destinationPath)) {
                        //path does not exist
                        File::makeDirectory($destinationPath, $mode = 0777, true, true);
                    }

                    $extension=$file->getClientOriginalExtension();
                    $fileName = 'product'.$id.'_carousel_'.$pic_id.'.'.$extension;
                    $file->move($destinationPath,$fileName);

                    $pic->path='/images/products/p_'.$id.'/'.$fileName;
                    $pic->save();

                }
            }

            $areafiles =  $request->file('areaFiles');

            if($areafiles[0]!=null)
            {
                foreach($areafiles as $file) {

                    $pic=ProductAreaPic::create([
                        'product_id'=>$id
                    ]);

                    $pic_id=$pic->id;

                    $destinationPath = base_path() . '/public/images/products/p_'.$id;

                    //create folder
                    if(!File::exists($destinationPath)) {
                        //path does not exist
                        File::makeDirectory($destinationPath, $mode = 0777, true, true);
                    }

                    $extension=$file->getClientOriginalExtension();
                    $fileName = 'product'.$id.'_area_'.$pic_id.'.'.$extension;
                    $file->move($destinationPath,$fileName);

                    $pic->path='/images/products/p_'.$id.'/'.$fileName;
                    $pic->save();

                }
            }


        }

        //------ end of files array ------

        $this->succMsg($request,'Data updated');

        $category =$request->get('category');

        return redirect('admin/product/cate/'.$category);

    }

    public function destroy($id, Request $request)
    {
        $task = Product::destroy($id);

        ProductAreaPic::where('product_id','=',$id)->delete();
        ProductCarousel::where('product_id','=',$id)->delete();
        ProductPics::where('product_id','=',$id)->delete();

        File::deleteDirectory('images/products/p_'.$id);

        $this->succMsg($request,'刪除成功');

        return Response()->json($task);
    }

    public function carouselDel($id)
    {
        $pic=ProductCarousel::find($id);

        //$succ=File::delete($pic->path);

        $task = ProductCarousel::destroy($id);

        return Response()->json($task);
    }

    public function areaDel($id)
    {
        $task = ProductAreaPic::destroy($id);

        return Response()->json($task);
    }


    public function showCatePage($cate)
    {
        $products=Product::where('category',$cate)->orderBy('created_at', 'desc')->paginate(10);

        foreach($products as $product)
        {
            $p_id=$product->id;
            $pics = Product::find($p_id)->productPics;

            $pathArray=[];
            foreach($pics as $pic)
            {
                $pic_destination=$pic->path;
                array_push($pathArray,$pic_destination);
            }
            $product->pathArray=$pathArray;
        }

        return view('admin.product.index',compact('products','cate'));
    }
}
