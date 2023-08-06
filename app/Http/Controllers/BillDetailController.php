<?php

namespace App\Http\Controllers;

use App\Models\BillDetail;
use Illuminate\Http\Request;

class BillDetailController extends Controller
{
    public function index($id){
        $BillDetail = BillDetail::all()->where('bill_id',$id);
        return view('admin.billdetail.billdetail',compact('BillDetail'));
    }
}
