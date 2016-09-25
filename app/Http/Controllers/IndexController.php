<?php

namespace App\Http\Controllers;

use App\IndexPics;
use App\News;
use App\Overview;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller
{
    public function index()
    {
        $index_pics=IndexPics::all();

        $products=Product::where('category','=',1)->get();

        foreach($products as $product)
        {
            $product_picture=$product->productPics->first();
            $product->product_picture=$product_picture;
        }

        $about=Overview::all()->first()->about;

        $news=News::take(5)->get();

        return view('front.index',compact('products','about','news','index_pics'));
    }
}
