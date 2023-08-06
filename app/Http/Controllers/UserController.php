<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function getUser(){
        $User = User::all()->where('deleted_at', null);
        return view('admin.user.list',compact('User'));

    }
    public function add(UserRequest $request){
        if($request->isMethod('POST')){
            $User = User::create($request->except('_token'));
            if($User->id){
                Session::flash('success','Tạo tài khoản thành công');
                return redirect()->route('addUser');
            }
        }
        return view('account.signup');
    }
    public function addAdmin(UserRequest $request){
        if($request->isMethod('POST')){
            $User = User::create($request->except('_token'));
            if($User->id){
                Session::flash('success','Tạo tài khoản thành công');
                return redirect()->route('listUser');
            }
        }
        return view('admin.user.add');
    }
    public function edit(UserRequest $request,$id){
        $User = User::find($request->id);
        if($request->isMethod('POST')){
            $result = User::where('id',$id)->update($request->except('_token'));
            if($result){
                Session::flash('success','Cập nhật thành công');
                return redirect()->route('listUser');
            }
        }
        return view('admin.user.edit',compact('User'));
        
    }
    public function delete($id){
        User::where('id',$id)->delete();
        Session::flash('suscess','xóa thành công');
        return redirect()->route('listUser');
    }
    
}
