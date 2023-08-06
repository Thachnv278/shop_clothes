<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\BillRequest;
use App\Mail\ShipedMail;
use App\Models\Bill;
use App\Models\BillDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class BillController extends Controller
{
    public function index(Request $request){
        
        return view('clients.billorder');
    }
    public function add(BillRequest $request){
        if($request->isMethod('POST')){
        $params = $request->except('_token');
        $params['date'] = date(now());
        $params['total'] = $request->total;
        $params['payment'] = $request->payment;
        $params['status'] = 0;
        $params['user_id'] = Auth::user()->id;
        $bill = Bill::create($params);
        session()->forget('total');
        if($bill->id){
            foreach(session('cart') as $cart){
                $detail = new BillDetail();
                $detail->product_id = $cart['product_id'];
                $detail->quantity = $cart['quantity'];
                $detail->price = $cart['price'];
                $detail->total = $cart['price'] * $cart['quantity'];
                $detail->size = $cart['size'];
                $detail->color = $cart['color'];
                

                $detail->bill_id = $bill->id;
                $detail->save();
            }
            session()->forget('cart');
            Session::flash('success','đặt hàng thành công');
            $billdetail=BillDetail::where('bill_id',$bill->id)->get();
            Mail::to(Auth::user()->email)->send(new ShipedMail($bill,$billdetail));
            return redirect()->route('showbill')->with('success','đặt hàng thành công');
        }
        }
        
       
        return view('clients.billorder');
        
    }
    public function billdetail(Request $request ,$id){
        $bill = Bill::find($id);
        $billdetail=BillDetail::where('bill_id',$id)->get();
        return view('clients.bill.detail',compact('bill','billdetail')); 
    }
    public function showbill(Request $request){
        $bills = Bill::where('user_id', Auth::user()->id)->get();
        return view('clients.bill.showbill', compact('bills'));
    }
}
