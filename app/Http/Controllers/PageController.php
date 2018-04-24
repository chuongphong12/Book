<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Book;
use App\BookType;
use App\Cart;
use App\Bill;
use App\Customer;
use App\BillDetail;
use App\User;
use Session;
use Hash;
use Auth;

class PageController extends Controller
{
    public function getIndex(){
    	$slide = Slide::all();
    	$new_product = Book::where('new',1)->get();
        $top_product = Book::where('new',2)->get();
        $view = Book::where('view','>',1)->get();
    	return view('pages.homepage',compact('slide','new_product','top_product','view'));
    }
    public function getLoaiSp($type){
    	$sp_theoloai = Book::where('id_type',$type)->get();
    	$loai_sp = BookType::all();
    	$sp_khac = Book::where('id_type','<>',$type)->get();
    	$ten_sp = BookType::where('id',$type)->first();
    	return view('pages.loai-sanpham',compact('sp_theoloai','loai_sp','sp_khac','ten_sp'));
    }
    public function getProduct($id, Request $request){
    	$product = Book::where('id',$request->id)->first();
    	$related = Book::where('id_type',$product->id_type)->get();
        $cats = BookType::where('id',$product->id_type)->first();
    	$new_product = Book::where('new',1)->get();
    	$top_product = Book::where('new',2)->get();
        if(! ( Session::get('id') == $id)){
            Book::where('id', $product->id)->increment('view');
            return view('pages.product',compact('product','related','new_product','top_product','cats'));
            Session::put('id', $id);
          }
    }
    public function getContact(){
    	return view('pages.contact');
    }
    public function getAbout(){
    	return view('pages.about');
    }

    public function getAddtoCart(Request $req,$id){
    	$product = Book::find($id);
    	$oldCart = Session('cart')?Session::get('cart'):null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $id);
    	$req->session()->put('cart',$cart);
    	return redirect()->back();
    }

    public function getDeleteCart($id){
    	$oldCart = Session::has('cart')?Session::get('cart'):null;
    	$cart = new Cart($oldCart);
    	$cart->reduceByOne($id);
    	if(count($cart->items)>0){
    		Session::put('cart',$cart);
    	}
    	else {
    		Session::forget('cart');
    	}
    	return redirect()->back();
    }

    public function getCheckout(){
    	return view('pages.checkout');
    }

	public function postCheckout(Request $req){
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->status = 0;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_book = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }

    public function getLogin(){
    	return view('pages.homepage');
    }
    public function getSignup(){
    	return view('pages.homepage');
    }

    public function postSignup(Request $req){
    	$this->validate($req,
    		[
    			'email'=>'required|email|unique:users,email',
    			'password'=>'required|min:6|max:20',
    			'fullname'=>'required',
    			're_password'=>'required|same:password',
    			'address'=>'required',
    			'phone'=>'required'
    		],
    		[
    			'email.required'=>'Vui lòng nhập email',
    			'password.required'=>'Vui lòng nhập password',
    			'fullname.required'=>'Vui lòng nhập tên',
    			're_password.required'=>'Vui lòng nhập lại password',
    			'address.required'=>'Vui lòng nhập địa chỉ',
    			'phone.required'=>'Vui lòng nhập số đt',
    			'email.email'=>'Vui lòng nhập đúng định dạng',
    			'email.unique'=>'Email đã tồn tại',
    			'password.min'=>'Tối thiểu phải có 6 ký tự',
    			'password.max'=>'Tối đa 20 ký tự',
    			'fullname.required'=>'Vui lòng nhập tên',
    			're_password.same'=>'Không trùng khớp ý với bé'
    		]);
    	$user = new User;
    	$user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->address = $req->address;
        $user->phone = $req->phone;
        $user->password = Hash::make($req->password);
        $user->level = 2;
    	$user->status = 1;
        $user->save();

        $credentials = array('email' =>$req->email,'password'=>$req->password);
        if(Auth::attempt($credentials) && Auth::user()->status == 1){
        return redirect()->route('trang-chu')->with('thanhcong','Tạo tài khoản thành công');
        }
    }

    public function postLogin(Request $req){
    	$this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Vui lòng nhập đúng định dạng',
                'password.required'=>'Vui lòng nhập password',
                'password.min'=>'Tối thiểu phải có 6 ký tự'
            ]
        );
        $credentials = array('email' =>$req->email,'password'=>$req->password);
        if(Auth::attempt($credentials) && Auth::user()->status == 1){
            return redirect()->route('trang-chu')->with('thongbao','Đăng nhập thàng công');
        }
        else{
            if (Auth::attempt($credentials) && Auth::user()->status != 1) {
                Auth::logout();
                return Redirect()->route('getBlockUser');
            }
            else{
                return redirect()->back()->with('thongbao','Đăng nhập không thành công');
            }     
        }
    }

    public function getLogout(){
    	Auth::logout();
    	Session::forget('cart');
    	return redirect()->route('trang-chu');
    }

    public function getTest(){
    	$slide = Slide::all();
    	$new_product = Book::where('new',1)->get();
    	$top_product = Book::where('new',2)->get();
    	$crepe = Book::where('id_type',5)->get();
    	return view('pages.test',compact('slide','new_product','top_product','crepe'));
    }

    public function getEditUser($id){
        $user = User::find($id);
        return view('pages.edit',compact('user','id'));
    }
    public function postEditUser($id , Request $req){
        $user = User::find($id);
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->address = $req->address;
        $user->phone = $req->phone;
        if(empty($req->password)){
            $user->password = $user->password;
        }
        else {
            $user->password = Hash::make($req->password);
        }
        $user->save();
        return redirect()->route('trang-chu',Auth::user()->id)->with(['thongbao'=>'Cập nhật thành công ! ']);
    }
    public function getBlockUser(){
        return view('errors.userblock');
    }
}
