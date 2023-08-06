<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Detail;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function getProduct(){
        $Product =Product::all()->where('deleted_at', null);
        $Brand= Brand::all();
        $Detail= Detail::all();
        $Category = Category::all();
        return view('admin.product.list',compact('Product','Brand','Category','Detail'));
    }
    public function add(ProductRequest $request){
        $Brand= Brand::all();
        $Category = Category::all();
        if($request->isMethod('POST')){
            $param=$request->except('_token');
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $param['image']=uploadFile('image',$request->file('image'));
            }
            $Product= Product::create($param);
            if($Product->id){
                Session::flash('success','Thêm thành công');
                return redirect()->route('listProduct');
            }
        }
        return view('admin.product.add',compact('Brand','Category'));
        
    }
    public function edit(ProductRequest $request,$id){
       $Product = Product::find($id);
        $Brand = Brand::all();
        $Category = Category::all();
        if($request->isMethod('POST')){
            $param=$request->except('_token');
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $resultDL=Storage::delete('/public/'.$Product->image);
                if($resultDL){
                    $param['image']=uploadFile('image',$request->file('image'));
                } else{
                    $param ['image'] = $Product->image;
                }
            }
            $result = Product::where('id',$id)->update($param);
            if($result){
                Session::flash('success','Cập nhật thành công');
                return redirect()->route('listProduct');
            }
        }
        return view('admin.product.edit',compact('Brand','Category','Product'));  
    }
    public function delete($id){
        Product::where('id',$id)->delete();
        Session::flash('success','xóa thành công');
        return redirect()->route('listProduct');
    }
}
