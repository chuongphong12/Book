<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CatRequest;
use App\BookType;

class CatController extends Controller
{
    public function getAdd(){
		$parent = BookType::select('id','name','description')->get()->toArray();
    	return view('admin.cats.add',compact('parent'));
    }
    public function postAdd(CatRequest $request){
    	$cat = new BookType;
    	$cat->name = $request->txtName;
    	$cat->description = $request->txtDescription;
    	$cat->save();
    	return redirect()->route('admin.cats.getList')->with(['flash_message'=>'Danh mục được thêm mới thành công']);
    }
    public function getList(){
    	$data =BookType::select('id','name','description')->orderBy('id','DESC')->get()->toArray();
        return view('admin.cats.list',compact('data'));
    }
    public function getEdit($id){
        $data = BookType::findOrFail($id)->toArray();
        return view('admin.cats.edit',compact('data','id'));
    }
    public function postEdit(Request $request , $id){
        $cat = BookType::find($id);
        $cat->name = $request->txtName;
        $cat->description = $request->txtDescription;
        $cat->save();
        return redirect()->route('admin.cats.getList')->with(['flash_message'=>'Danh mục được sửa thành công !']);
    }
    public function getDelete($id){
        // Kiểm tra , nếu danh mục sản phẩm
            $cat = BookType::find($id);
            $cat->delete($id);
            return redirect()->route('admin.cats.getList')->with(['flash_message'=>'Danh mục đã được xóa !']);
    }
}
