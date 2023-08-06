<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DetaiProductController extends Controller
{
    public function index($id){
        $Product = Product::find($id);
        return view('clients.detailproduct',compact('Product'));
    }
}
