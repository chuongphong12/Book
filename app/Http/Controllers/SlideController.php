<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Input;
use File;
use App\Slide;

class SlideController extends Controller
{
  	public function getAdd(){
    	$slide = Slide::all();
    	return view ('admin.slide.add',compact('slide'));
    }
    public function postAdd(Request $request){
    	$file_name = Request::file('SImages')->getClientOriginalName();
    	$sl = new Slide();
    	$sl->image=$file_name;
    	Request::file('SImages')->move('sources/image/slide/',$file_name);
    	$sl->save();

    	return redirect()->route('admin.slide.getList')->with(['flash_message'=>'Slide được thêm mới thành công !']);
    }
    public function getList(){
    	$data = Slide::select('id','image','created_at')->orderBy('id','DESC')->get()->toArray();
        return view('admin.slide.list',compact('data'));
    }
    public function getDelete($id){
    	// Rang buoc du lieu khi xoa product
        $slide = Slide::find($id);
        // Xoa hinh trong product
        File::delete('sources/image/slide/'.$slide->image);
        // Xoa du lieu trong bang Product
        $slide->delete($id);

    	return redirect()->route('admin.slide.getList')->with(['flash_message'=>'Sản phẩm đã được xóa !']);
    }
    public function getEdit($id){
        $slide = Slide::find($id);
        return view('admin.slide.edit',compact('slide'));
    }
    public function postEdit($id ,Request $request){
        $slide = Slide::find($id);
        $img_current = 'sources/image/slide/'.Request::input('img_current');
        if (!empty(Request::file('SImages'))) {
            $file_name = Request::file('SImages')->getClientOriginalName();
            $slide->image = $file_name;
            Request::file('SImages')->move('sources/image/slide/',$file_name);
            if (File::exists($img_current)) {
                File::delete($img_current);
            }
        }
        else{
            echo "Không có file";
        }
        $slide->save();
        return redirect()->route('admin.slide.getList')->with(['flash_message'=>'Slide sửa thành công !']);
    }
}
