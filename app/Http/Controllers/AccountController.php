<?php


namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function showsignin(){
        return view('account.signin');
    }
    public function signin(AccountRequest $request){
      $credentials = $request->only('email', 'password');
        if(auth()->attempt($credentials)){
             return redirect()->route('home')->with('success', 'Đăng nhập thành công!'); 
        }
        return redirect()->route('showsignin')->with('error', 'Đăng nhập không chính xác');
             
    }
    public function signout(){
            Auth::logout(); 
            return redirect()->route('showsignin');
    }
}
