<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{


    public function show()
    {
        if (!Session::has('cart')) {
            session()->put('cart');
        }


        return view('clients.shopingcart');
    }
    public function add(Request $request)
    {

        $detail = Detail::find($request->input('id'));
        $size = $request->input('size');
        $color = $request->input('color');

        if (!$detail || !$size || !$color) {
            return back()->withErrors(['message' => 'Sản phẩm không tồn tại']);
        }
        $quantity = $request->input('quantity') ?? 1; // Nếu không có giá trị được gửi từ form, mặc định là 1
        $cart = session()->get('cart');

        if (!isset($cart["$detail->id" . '_' . "$size" . '_' . "$color"])) {
            $cart["$detail->id" . '_' . "$size" . '_' . "$color"] = [
                'id' => $detail->id,
                'name' => $detail->product->name,
                'price' => $detail->product->price,
                'quantity' => $quantity,
                'image' => $detail->product->image,
                'size' => $size,
                'color' => $color,

                'product_id'=>$detail->product->id
            ];
        }elseif($cart["$detail->id" . '_' . "$size" . '_' . "$color"]['size'] == $size && $cart["$detail->id" . '_' . "$size" . '_' . "$color"]['color'] == $color){
            $cart["$detail->id" . '_' . "$size" . '_' . "$color"]['quantity'] =  $cart["$detail->id" . '_' . "$size" . '_' . "$color"]['quantity']+$quantity;
        }elseif($cart["$detail->id" . '_' . "$size" . '_' . "$color"]['size'] != $size || $cart["$detail->id" . '_' . "$size" . '_' . "$color"]['color'] != $color){
            $cart["$detail->id" . '_' . "$size" . '_' . "$color"] = [
                'id' => $detail->id,
                'name' => $detail->product->name,
                'price' => $detail->product->price,
                'quantity' => $quantity,
                'image' => $detail->product->image,
                'size' => $size,
                'color' => $color,
                'product_id'=>$detail->product->id
            ];
        }
        session()->put('cart', $cart);
        // dd($cart);



        return view('clients.shopingcart', compact('cart'));
    }

    public function update(Request $request)
    {
        $quantity = $request->input('quantity');

        $cart = session()->get('cart', []);
        foreach ($cart as $key => $item) {

            $cart[$key]['quantity'] = $quantity[$key];
        }
        session()->put('cart', $cart);

        return redirect()->route('showcart');
    }
    public function delete(Request $request, $id)
    {

        $cart = session()->get('cart');

        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->route('showcart');
    }
}
