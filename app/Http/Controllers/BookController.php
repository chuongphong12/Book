<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Input;
use File;
use App\Book;
use App\BookType;
use App\ProductImage;
use Request;
use Auth;
use DB;

class BookController extends Controller
{
    public function getAdd()
    {
        $cats = BookType::all();
        return view('admin.products.add', compact('cats'));
    }
    public function postAdd(ProductRequest $request)
    {
        $file_name = $request->file('fImages')->getClientOriginalName();
        $product = new Book();
        $product->isbn = $request->txtIsbn;
        $product->title = $request->txtTitle;
        $product->author = $request->txtAuthor;
        $product->publisher = $request->txtPublisher;
        $product->company_release = $request->txtCompany;
        $product->id_type = $request->sltParent;
        $product->description = $request->txtDescription;
        $product->page = $request->txtPage;
        $product->release_date  = $request->txtRelease;
        $product->unit_price = $request->txtUnit_price;
        $product->promotion_price = $request->txtPromotion_price;
        $product->image = $file_name;
        $product->unit = $request->txtUnit;
        $product->new = 1;
        $request->file('fImages')->move('sources/image/product/', $file_name);
        $product->view = 0;
        $product->save();

        return redirect()->route('admin.products.getList')->with(['flash_message' => 'Sản phẩm được thêm mới thành công !']);
    }
    public function getList()
    {
        $data = Book::select('id', 'isbn', 'title', 'id_type', 'description', 'unit_price', 'promotion_price', 'unit', 'view', 'created_at')->orderBy('id', 'DESC')->get()->toArray();
        return view('admin.products.list', compact('data'));
    }

    public function getListApi()
    {
        $book = Book::select('id', 'isbn', 'title', 'id_type', 'description', 'unit_price', 'promotion_price', 'unit', 'view', 'created_at')->orderBy('id', 'DESC')->get()->toArray();
        return \response()->json([
            'book' => $book
        ]);
    }

    public function getDelete($id)
    {
        // Rang buoc du lieu khi xoa product 
        $product = Book::find($id);
        // Xoa hinh trong product
        File::delete('sources/image/product/' . $product->image);
        // Xoa du lieu trong bang Product
        $product->delete($id);

        return redirect()->route('admin.products.getList')->with(['flash_message' => 'Sản phẩm đã được xóa !']);
    }
    public function getEdit($id)
    {
        $cats = BookType::all();
        $product = Book::find($id);
        return view('admin.products.edit', compact('cats', 'product'));
    }
    public function postEdit($id, Request $request)
    {
        $product = Book::find($id);
        $product->isbn = Request::input('txtIsbn');
        $product->title = Request::input('txtTitle');
        $product->author = Request::input('txtAuthor');
        $product->publisher = Request::input('txtPublisher');
        $product->company_release = Request::input('txtCompany');
        $product->id_type = Request::input('sltParent');
        $product->description = Request::input('txtDescription');
        $product->page = Request::input('txtPage');
        $product->release_date = Request::input('txtRelease');
        $product->unit_price = Request::input('txtUnit_price');
        $product->promotion_price = Request::input('txtPromotion_price');
        $product->unit = Request::input('txtUnit');
        $product->new = Request::input('rdoNew');
        $product->view = $product->view;
        $img_current = 'sources/image/product/' . Request::input('img_current');
        if (!empty(Request::file('fImages'))) {
            $file_name = Request::file('fImages')->getClientOriginalName();
            $product->image = $file_name;
            Request::file('fImages')->move('sources/image/product/', $file_name);
            if (File::exists($img_current)) {
                File::delete($img_current);
            }
        } else {
            echo "Không có file";
        }
        $product->save();
        return redirect()->route('admin.products.getList')->with(['flash_message' => 'Sản phẩm sửa thành công !']);
    }

    public function getDetail($id)
    {
        $data = Book::findOrFail($id)->toArray();
        return view('admin.products.details', compact('data', 'id'));
    }
    public function getDelImg($id)
    {
        $idPic = (int) Request::get('idPic');
        $image_detail = ProductImage::find($idPic);
        if (!empty($image_detail)) {
            $img = 'resources/upload/detail/' . $image_detail->image;
            if (File::exists($img)) {
                File::delete($img);
            }
            $image_detail->delete();
        }
        return "Oke";
    }
}
