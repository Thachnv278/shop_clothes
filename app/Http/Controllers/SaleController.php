<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SaleController extends Controller
{
   public function index(){
      $Sale= Sale::all();
       return view('admin.sale.list',compact('Sale'));
   }
   public function add(SaleRequest $request){
    if($request->isMethod('POST')){
      $Sale = Sale::create($request->except('_token'));
      if($Sale->id){
         Session::flash('success','Thêm thành công');
         return redirect()->route('listSale');
      }
    }
    return view('admin.sale.add');
   }
   public function edit(SaleRequest $request, $id){
       $Sale = Sale::find($id);
       if($request->isMethod('POST')){
        $result= Sale::where('id',$id)->update($request->except('_token'));
        if($result){
          Session::flash('success','Cập nhật thành công');
            return redirect()->route('listSale');
        }
       }
       return view('admin.sale.edit',compact('Sale'));
   }
   public function delete($id){
       Sale::where('id',$id)->delete();
       Session::flash('success','Xóa thành công');
       return redirect()->route('listSale');
   }
}
