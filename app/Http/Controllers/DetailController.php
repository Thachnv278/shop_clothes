<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailRequest;
use App\Models\Detail;
use App\Models\Product;

use Illuminate\Support\Facades\Session;

class DetailController extends Controller
{
    public function getDetail($id){
        $Detail= Detail::all()->where('product_id',$id);
        return view('admin.detail.list',compact('Detail'));
    }
    public function add(DetailRequest $request,$id){
        // dd($request);
        $Product= Product::find($id);
        if($request->isMethod('POST')){
            $Detail= Detail::create($request->except('_token'));
            if($Detail->id){
                Session::flash('success','thêm chi tiết thành công');
                return redirect()->route('listProduct');
            }
        }
        return view('admin.detail.add',compact('Product'));
    }
    public function edit(DetailRequest $request,$id){
        $Product= Product::find($id);
        $Detail= Detail::find($id);
        if($request->isMethod('POST')){
            $result= Detail::where('id',$id)->
            update($request->except('_token','product_id'));
            if($result){
                Session::flash('success','cập nhật thành công');
                return redirect()->route('listProduct');
            }
        }
        return view('admin.detail.edit',compact('Detail','Product'));
    }
    public function delete($id){
        Detail::where('id',$id)->delete();
        Session::flash('success','xóa thành công');
        return redirect()->route('listProduct');
    }
}
