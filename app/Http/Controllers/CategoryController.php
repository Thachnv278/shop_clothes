<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
class CategoryController extends Controller
{
    public function getCategory(){
        $Category= Category::all()->where('deleted_at', null);
        return view('admin.category.list',compact('Category'));
    }
    public function add(CategoryRequest $request){
        if($request->isMethod('POST')){ 
            $Category = Category::create($request->except('_token'));
            if($Category->id){
                Session::flash('success','Thêm danh mục thành công');
                return redirect()->route('listCategory');
            }
        }
        return view('admin.category.add');
    }
    public function edit(CategoryRequest $request,$id){
        $Category = Category::find($id);
        if($request->isMethod('POST')){
          $result = Category::where('id',$id)
          ->update($request->except('_token'));
          if($result){
            Session::flash('success','Cập nhật thành công');
              return redirect()->route('listCategory');
          }
        }
        return view('admin.category.edit',compact('Category'));
    }
    public function delete($id){
        Category::where('id',$id)->delete();
        Session::flash('success','Xóa thành công');
        return redirect()->route('listCategory');
    }
}
