<?php

namespace App\Http\Controllers\clients;
use App\Models\Banner;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Detail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $Product = Product::all();
        $Category = Category::all();
        $Banner = Banner::all()->where('deleted_at',null);
        return view('clients.index',compact('Banner','Product','Category'));
    }
    public function detail($id){
        $Product = Product::find($id)->where('id',$id)->get();
        $sizes = Detail::distinct()->pluck('size')->toArray();
        $colorsBySize = Detail::select('size', 'color')->get()->groupBy('size');
        $Detail = Detail::all()->where('product_id',$id);
        return view('clients.detail',compact('Product','Detail','sizes', 'colorsBySize'));
    }
    

  
  

}
