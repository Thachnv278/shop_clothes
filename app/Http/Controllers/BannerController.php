<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function getBanner()
    {
        $Banner = Banner::all()->where('delete_at', null);
        return view('admin.banner.list', compact('Banner'));
    }
    public function add(BannerRequest $request)
    {
        if ($request->isMethod('POST')) {
            $param = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $param['image'] = uploadFile('image', $request->file('image'));
            }
            $Banner = Banner::create($param);
            if ($Banner->id) {
                Session::flash('success', 'thêm thành công');
                return redirect()->route('listBanner');
            }
        }
        return view('admin.banner.add');
    }
    public function edit(BannerRequest $request, $id)
    {
        $Banner = Banner::find($id);
        if ($request->isMethod('POST')) {
            $param = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $resultDL =Storage::delete('/public/' . $Banner->image);
                if ($resultDL) {
                    $param['image'] = uploadFile('image', $request->file('image'));
                } 
            }else {
                $param['image'] = $Banner->image;
            }
            $result = Banner::where('id',$id)->update($param);
            if($result){
                Session::flash('success','sửa thành công');
                return redirect()->route('listBanner');
            }
        }
        return view('admin.banner.edit',compact('Banner'));
    }
    public function delete($id){
        Banner::where('id',$id)->delete();
        Session::flash('success','xóa thành công');
        return redirect()->route('listBanner');
    
    }
}
