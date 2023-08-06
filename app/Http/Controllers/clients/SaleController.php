<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function saleadd(Request $request){
        if(!$request->sale){
        return redirect()->back();
        }
        $saleinput = $request->sale;
        $sale = Sale::where('code',$saleinput)->first();
        if(!$sale){
            return redirect()->back()->with('error','Không tìm thấy  mã code');
        }
        $total = $request->total;
        
        $total = $total - $sale->discount;
        
        session()->put('total',$total);
        return redirect()->back()->with('success','Áp mã thành công');


    }
}
