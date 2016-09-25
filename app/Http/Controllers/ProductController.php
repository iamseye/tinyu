<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;

class ProductController extends Controller
{
    public function showCatePage($cate)
    {
        $products=Product::where('category',$cate)->orderBy('created_at', 'desc')->get();

        foreach($products as $product)
        {
            $product_picture=$product->productPics->first();
            $product->pic=$product_picture;
        }

        if($cate==1){
            $cate_name='木屋';
            $cate_name_eng='Chalet';
        }else if($cate==2)
        {
            $cate_name='材料';
            $cate_name_eng='Material';

        }else if($cate==3){
            $cate_name='木製家具';
            $cate_name_eng='Furniture';

        }else
        {
            $cate_name='工程';
            $cate_name_eng='Construction';

        }

        if(count($products)==1)
        {
            $id=$products->first()->id;
            return redirect()->action(
                'ProductController@show', ['id' => $id]
            );
        }
        else if ($cate==1)
        {
            return view('front.product.list_cate1',compact('products'));
        }
        else
        {
            return view('front.product.list',compact('products','cate_name','cate_name_eng'));

        }
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

        if($product->category==1){
            $cate_name='木屋';
            $cate_name_eng='Chalet';
        }else if($product->category==2)
        {
            $cate_name='材料';
            $cate_name_eng='Material';

        }else if($product->category==3){
            $cate_name='木製家具';
            $cate_name_eng='Furniture';

        }else
        {
            $cate_name='工程';
            $cate_name_eng='Construction';

        }

        if($product->category==1)
        {
            return view('front.product.detail_cate1',compact('product','pics','carouselPics','areaPics','cate_name','cate_name_eng'));
        }
        else{
            return view('front.product.detail',compact('product','pics','cate_name','cate_name_eng'));
        }

    }
}
