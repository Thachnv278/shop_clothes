<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BIllController extends Controller
{
    public function index(){
    $Bill = Bill::all();
    return view('admin.bill.list',compact('Bill'));
    }
    public function edit(Request $request ,$id){
        $Bill = Bill::find($id);
        if($request->isMethod('POST')){
            $param = $request->input('status');
            $result = Bill::where('id',$id)->update(['status' =>$param]);
            if($result){
                Session::flash('success','Cập nhật thành công');
                return redirect()->route('listBill');
            }
        }
        return view('admin.bill.edit',compact('Bill'));
        
    }
    
}
