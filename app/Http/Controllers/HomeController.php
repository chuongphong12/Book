<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\PostEditRequest;
use App\User;
use App\BookType;
use App\Book;
use DB;
use Session;
use Hash;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*$this->middleware('auth');*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('books')->select('isbn', 'title', 'image', 'cost', 'alias')->orderBy('isbn', 'DESC')->paginate(8);
        $mostview = DB::table('product_details')->orderBy('view', 'DESC')->skip(0)->take(8)->get();
        return view('shop.pages.trangchu', compact('product', 'mostview'));
    }
    public function survey()
    {
        return view('admin.pages.survey');
    }
    public function chart()
    {
        $result = \DB::table('books')
            ->where('view', '>', '1')
            ->orderBy('view', 'DSC')
            ->get();
        return response()->json($result);
    }
    public function table()
    {
        $user = User::select('id', 'full_name', 'level', 'status', 'created_at')->orderBy('id', 'DESC')->get()->toArray();
        $cats = BookType::select('id', 'name', 'description')->orderBy('id', 'DESC')->get()->toArray();
        $data = Book::select('id', 'isbn', 'title', 'id_type', 'description', 'unit_price', 'promotion_price', 'unit', 'created_at')->orderBy('isbn', 'DESC')->get()->toArray();
        return view('admin.pages.tables', compact('user', 'cats', 'data'));
    }
    public function form()
    {
        return view('admin.pages.form');
    }
    public function calendar()
    {
        return view('admin.pages.calendar');
    }
    public function chitietsanpham($id)
    {
        $product = DB::table('books')->where('isbn', $id)->first();
        $product_image = DB::table('product_images')->select('id', 'image')->where('product_id', $product->id)->get();
        $product_detail = DB::table('product_details')->where('product_id', $product->id)->first();
        $product_cats = DB::table('books')->where('cat_id', $product->cat_id)->get();
        if (!(Session::get('id') == $id)) {
            ProductDetail::where('product_id', $product->id)->increment('view');
            return view('shop.pages.singleproduct', compact('product', 'product_image', 'product_detail', 'product_cats'));
            Session::put('id', $id);
        }
    }
    public function loaisanpham($id)
    {
        $product_cats = DB::table('books')->where('cat_id', $id)->paginate(6);
        $hightview = DB::table('product_details')->where('product_id', $id)->paginate(6);
        $cats = DB::table('categorys')->select('name', 'parent_id')->where('id', $product_cats[0]->cat_id)->first();
        $menu_left = DB::table('categorys')->where('parent_id', $cats->parent_id)->get();
        $mostview = DB::table('product_details')->orderBy('view', 'DESC')->get();
        return view('shop.pages.listproduct', compact('product_cats', 'menu_left', 'mostview', 'hightview', 'count'));
    }
    public function lienhe()
    {
        return view('shop.pages.contact');
    }
    public function getDangNhap()
    {
        return view('shop.pages.trangchu');
    }
    public function postDangNhap(Request $request)
    {
        $login = array('email' => $req->email, 'password' => $req->password);
        if (Auth::attempt($login) && Auth::user()->status == 1) {
            return redirect()->route('trangchu');
        } else {
            if (Auth::attempt($login) && Auth::user()->status != 1) {
                return Redirect()->route('getBlockUser');
            } else {
                return Redirect()->route('trangchu')->withErrors(['Đăng nhập không thành công', 'Kiểm tra lại username hoặc password .']);
            }
        }
    }
    public function getDangKy()
    {
        return view('shop.pages.trangchu');
    }
    public function postDangKy(Request $request)
    {
        $user = new User();
        if ($request->input('txtPasss')) {
            $this->validate(
                $request,
                [
                    'txtUserNames' => 'unique:users,name',
                    'txtRePasss' => 'same:txtPasss',
                    'txtEmails' => 'required|unique:users,email|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9]+)*@[a-z0-9]([a-z0-9][a-z0-9]+)*(\.[a-z]{2,4}){1,2}$/ '
                ],
                [
                    'txtRePasss.same' => 'Xác nhận mật khẩu chưa đúng . ',
                    'txtEmails.regex' => "Email không đúng định dạng ",
                    'txtUserNames.unique' => "Tài khoản đã tồn tại "
                ]
            );
            $pass = $request->input('txtPasss');
            $user->password = Hash::make($pass);
        }
        $user->name = $request->txtUserNames;
        $user->email = $request->txtEmails;
        $user->level = 2;
        $user->status = 1;
        $user->remember_token = $request->input('_token');
        $user->save();
        return redirect()->route('trangchu')->with(['flash_message' => 'Đăng ký thành công !']);
    }
    public function getDangXuat()
    {
        if (Auth::logout()) {
            return redirect()->route('trangchu');
        }
    }
    public function getEditUser($id)
    {
        $user = User::find($id);
        return view('shop.pages.detail', compact('user'));
    }
    public function postEditUser($id, Request $request)
    {
        $user = Book::find($id);
        $user->email = Request::input('email');
        $user->full_name = Request::input('fullname');
        $user->address = Request::input('address');
        $user->phone = Request::input('phone');
        if ($request->input('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->remember_token = $request->input('_token');
        $user->save();
        return redirect()->route('getEditUser', Auth::user()->id)->with(['flash_message' => 'Cập nhật thành công ! ']);
    }
    public function getBlockUser()
    {
        return view('errors.userblock');
    }
    public function getThanhToan()
    {
        return view('shop.pages.order');
    }
    public function postThanhToan(Request $request)
    {
    }
}
