<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;

use App\Models\Brand;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function getBrand()
    {
        // $Brand = DB::table('brands')->get();
        $Brand = Brand::all()->where('deleted_at', null); // tự động lấy ra những deleted_at là null
        // lấy theo điều kiện và trả về 1 dòng dữ liệu
       
        
        return view('admin.brand.list', compact('Brand'));
    }
    public function add(BrandRequest $request)
    {
        if ($request->isMethod('POST')) {
            $param = $request->except('_token');
            if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
                $param['logo'] = uploadFile('logo', $request->file('logo'));
            }
            $Brand = Brand::create($param);
            if ($Brand->id) {
                Session::flash('success', 'Thêm thành công');
                return redirect()->route('listBrand');
            }
        }
        return view('admin.brand.add');
    }
    public function edit(BrandRequest $request, $id)
    {
        $Brand = Brand::find($id);
        if ($request->isMethod('POST')) {
            $param = $request->except('_token');
            if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
                $resultDL = Storage::delete('/public/' . $Brand->logo);
                if ($resultDL) {
                    $param['logo'] = uploadFile('logo', $request->file('logo'));
                }
            } else {
                $param['logo'] = $Brand->logo;
            }
            $result = Brand::where('id', $id)->update($param);
            if ($result) {
                Session::flash('success', 'Sửa thành công');
                return redirect()->route('listBrand');
            }
        }
        return view('admin.brand.edit', compact('Brand'));
    }
    public function delete($id){
        Brand::where('id',$id)->delete();
        Session::flash('success','Xóa thành công');
        return redirect()->route('listBrand');
      }
}
