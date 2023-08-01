<?php

namespace App\Http\Controllers;

use App\Models\ChiTietHoaDonBan;
use App\Models\HoaDonBan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\loaisanpham;
use App\Models\tintuc;
use App\Models\sanpham;
use App\Models\KhachHang;
use App\Models\nguoidung;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class HomeController extends Controller
{
    public function index(){
        $sp= sanpham::limit(8)->paginate(8);
        $tt= tintuc::limit(3)->get();
        $lsp= loaisanpham::all();
        return view('index',['sanphams'=>$sp,'loaisp'=>$lsp,'tintucs'=>$tt]);

    }
    public function blog(){
        $lsp= loaisanpham::all();
        $tt= tintuc::all();
        return view('blog',['tintucs'=>$tt,'loaisp'=>$lsp]);
    }
    public function detail($id){
        $sp= sanpham::find($id);
        // dd($sp);
        $lsp= loaisanpham::all();
        return view('detail',['sanphams'=>$sp,'loaisp'=>$lsp]);
    }


    public function shop($id){

        $category_product = DB::table('loaisanpham')->where('MoTa', 'tốt')->orderBy('id','desc')->get();
        $list_product = DB::table('sanpham')->where('MoTa', 'tốt')->orderBy('id','desc')->limit(12)->get();
        $category_by_id = DB::table('sanpham')
        ->join('loaisanpham','sanpham.MaLoai','=', 'loaisanpham.id')->where('sanpham.MaLoai',$id)->paginate(6);

        $category_name = DB::table('loaisanpham')->where('loaisanpham.id', $id)->limit(1)->get();
        return view('shop')->with('loaisanphams',$category_product)
        ->with('category_by_id',$category_by_id)->with('sanpham',$list_product)
        ->with('category_name',$category_name);
    }

    public function checklogin(Request $request)
    {
        $tk = $request -> username;
        $mk = $request -> password;
        $check= KhachHang::where('UserName','=',$tk)->where('PassWord','=',$mk)->get();

        if(count($check)>0){
            $cus = session()->get('khachhang',[]);
                $cus = [
                    'id'=>$check[0]->id,'UserName'=>$check[0]->UserName,
                    'PassWord'=>$check[0]->PassWord,'HoVaTen'=>$check[0]->HoVaTen,
                    'DiaChi'=>$check[0]->DiaChi,'SoDienThoai'=>$check[0]->SoDienThoai,
                    'Email'=>$check[0]->Email
                ];
            session()->put('khachhang', $cus);
            return redirect()->route('Home.index');
        }
        else{
            return redirect('login')
                    ->withErrors(['login' => 'Tên đăng nhập hoặc mật khẩu không chính xác'])
                    ->withInput();
        }
    }

    public function logout(){
        session()->forget('khachhang');
        return redirect()->route('loginuser');
    }

    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }



    public function addbill(Request $request,$id){
        // $ngaytao = DateTime();

        $sum = 0;
        $cart = \Cart::getContent();



        $diachinhan = $request->DiaChiNhan;
        $now = Carbon::now();

        foreach ($cart as $x) {
            $sum += $x['quantity'] * $x['price'];
        }
        HoaDonBan::create([
            'MaKhachHang'=>$id,
            'DiaChiNhan' => $diachinhan,
            'NgayTao' => $now,
            'TrangThai' => 0,
            'MoTa' => '',
            'TongTien' => $sum
        ]);

        $lastproduct = HoaDonBan::latest()->first();

        foreach ($cart as $x) {
            ChiTietHoaDonBan::create(
                [
                    'MaSanPham'=>$x['id'],
                    'MaHoaDon'=>$lastproduct->id,
                    'SoLuong'=>$x['quantity'],
                    'TamTinh'=>$x['price']*$x['quantity']
                ]
                );
        }

        // session()->flash('cart');
        \Cart::clear();


        return redirect()->route('Home.index');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $products = sanpham::where('TenSanPham', 'like', '%' . $keyword . '%')->get();

        return view('search', compact('products', 'keyword'));
    }


}
