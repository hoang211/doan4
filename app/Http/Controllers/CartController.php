<?php

namespace App\Http\Controllers;

use App\Models\ChiTietHoaDonBan;
use App\Models\HoaDonBan;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }

    // public function cart()
    // {
    //     $carts = session()->get('cart',[]);
    //     return view('cart', compact('carts'));
    // }

    public function thanhtoan()
    {
        $listkh = session()->get('khachhang',[]);
        if(count($listkh)<1){
            return redirect()->route('loginuser');
        }
        $carts = session()->get('cart');
        return view('thanhtoan',compact('carts'),compact('listkh'));
    }


    public function qldonhang()
    {
        $db = HoaDonBan::all();
        return view('donhang',['donhang'=>$db]);
    }
    public function qlddonhang()
    {
        $db = HoaDonBan::all();
        return view('duyet',['duyet'=>$db]);
    }
    public function qldonhangchitiet($id)
    {
        $donhang = HoaDonBan::find($id);
        $chitiet = ChiTietHoaDonBan::where('MaHoaDon',$id)->get();
        return view('donhangchitiet',['donhang'=>$donhang,'chitiet'=>$chitiet]);
    }
    public function thanhtoan1(Request $request)
    {
        $db = new HoaDonBan();
        $cartItems = \Cart::getContent();
        $db->MaKhachHang = $request->txtmakh;
        $db->MoTa = $request->txtmota;
        $db->DiaChiNhan = $request->txtaddress;
        $db->trangthai = 0;
        $db->NgayTao = date('Y-m-d H:i:s');
        $db->TongTien = \Cart::getTotal();

        $db->save();
        foreach($cartItems as $sp){
            $db1 = new ChiTietHoaDonBan();
            $db1->MaHoaDon=$db->id;
            $db1->MaSanPham=$sp->id;
            $db1->TamTinh=$sp->GiaBan*$sp->SoLuong;
            $db1->SoLuong=$sp->SoLuong;
            $db1->save();
        }
        \Cart::clear();
        // return redirect()->route('sanphams.list');
    }


}
