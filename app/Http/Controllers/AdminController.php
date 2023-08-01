<?php

namespace App\Http\Controllers;

use App\Models\ChiTietHoaDonBan;
use Illuminate\Http\Request;
use App\Models\loaisanpham;
use App\Models\nguoidung;
use App\Models\tintuc;
use App\Models\sanpham;
use App\Models\KhachHang;
use App\Models\HoaDonBan;


class AdminController extends Controller
{

    public function loaisp_index()
    {
        $db = loaisanpham::all();

        return view('admin.loaisp.index',['loaisp'=>$db]);
    }
    public function loaisp_delete($id)
    {
        loaisanpham::find($id)->delete();
        return redirect()->route('admin.loaisp.index');
    }
    public function loaisp_show($id)
    {
        $db = loaisanpham::find($id);
        return view('admin.loaisp.edit',['loaisp'=>$db]);
    }
    public function loaisp_update($id,Request $res)
    {
        loaisanpham::find($id)->update(['id'=>$id,'TenLoai'=>$res->TenLoai,'MoTa'=>$res->MoTa]);
        return redirect()->route('admin.loaisp.index');
    }
    public function loaisp_new()
    {
        $db = new loaisanpham();
        return view('admin.loaisp.add',['loaisp'=>$db]);
    }
    public function loaisp_store(Request $res)
    {
        loaisanpham::create(['TenLoai'=>$res->TenLoai,'MoTa'=>$res->MoTa]);
        return redirect()->route('admin.loaisp.index');
    }

//tin tức

    public function tintuc_index()
    {
        $tt = tintuc::all();

        return view('admin.tintuc.index',['tintuc'=>$tt]);
    }
    public function tintuc_delete($id)
    {
        tintuc::find($id)->delete();
        return redirect()->route('admin.tintuc.index');
    }
    public function tintuc_show($id)
    {
        $db = tintuc::find($id);
        return view('admin.tintuc.edit',['tintucs'=>$db]);
    }
    public function tintuc_update($id,Request $res)
    {
        tintuc::find($id)->update(['id'=>$id,'TieuDe'=>$res->TieuDe, 'NgayTao'=>$res->NgayTao, 'NoiDung'=>$res->NoiDung, 'Anh'=>$res->Anh, 'MaNguoiDung'=>$res->MaNguoiDung, 'TrangThai'=>$res->TrangThai]);
        return redirect()->route('admin.tintuc.index');
    }
    public function tintuc_new()
    {
        $db = new tintuc();
        return view('admin.tintuc.add',['tintucs'=>$db]);
    }
    public function tintuc_store(Request $res)
    {
        tintuc::create(['TieuDe'=>$res->TieuDe, 'NgayTao'=>$res->NgayTao, 'NoiDung'=>$res->NoiDung, 'Anh'=>$res->Anh, 'MaNguoiDung'=>$res->MaNguoiDung, 'TrangThai'=>$res->TrangThai]);
        return redirect()->route('admin.tintuc.index');
    }
//sản phẩm

    public function sanpham_index()
    {
        $sp = sanpham::all();

        return view('admin.sanpham.index',['sanphams'=>$sp]);
    }

    public function sanpham_show($id)
    {
        $db = sanpham::find($id);
        return view('admin.sanpham.edit',['sanpham'=>$db]);
    }
    public function sanpham_update($id,Request $res)
    {
        sanpham::find($id)->update(['id'=>$id,'TenSanPham'=>$res->TenSanPham,'Anh'=>$res->Anh,'MaLoai'=>$res->MaLoai,'SoLuong'=>$res->SoLuong,'GiaBan'=>$res->GiaBan,'MoTa'=>$res->MoTa,'ChiTietSanPham'=>$res->ChiTietSanPham]);
        return redirect()->route('admin.sanpham.index');
    }


    public function sanpham_delete($id)
    {
        sanpham::find($id)->delete();
        return redirect()->route('admin.sanpham.index');
    }


    public function sanpham_new()
    {
        $db = new sanpham();
        return view('admin.sanpham.add',['sanpham'=>$db]);
    }
    public function sanpham_store(Request $res)
    {
        sanpham::create(['TenSanPham'=>$res->TenSanPham,'Anh'=>$res->Anh,'MaLoai'=>$res->MaLoai,'SoLuong'=>$res->SoLuong,'GiaBan'=>$res->GiaBan,'MoTa'=>$res->MoTa,'ChiTietSanPham'=>$res->ChiTietSanPham]);
        return redirect()->route('admin.sanpham.index');
    }

    //người dùng
    public function nguoidung_index()
    {
        $nd = nguoidung::all();

        return view('admin.nguoidung.index',['nguoidung'=>$nd]);
    }
    public function nguoidung_delete($id)
    {
        nguoidung::find($id)->delete();
        return redirect()->route('admin.nguoidung.index');
    }
    public function nguoidung_show($id)
    {
        $db = nguoidung::find($id);
        return view('admin.nguoidung.edit',['nguoidungs'=>$db]);
    }
    public function nguoidung_update($id,Request $res)
    {
        nguoidung::find($id)->update(['id'=>$id,'HoTen'=>$res->HoTen,'DiaChi'=>$res->DiaChi, 'NgayTao'=>$res->NgayTao, 'DienThoai'=>$res->DienThoai, 'Anh'=>$res->Anh, 'Email'=>$res->Email, 'TrangThai'=>$res->TrangThai,'UserName'=>$res->UserName,'PassWord'=>$res->PassWord,]);
        return redirect()->route('admin.nguoidung.index');
    }
    public function nguoidung_new()
    {
        $db = new nguoidung();
        return view('admin.nguoidung.add',['nguoidungs'=>$db]);
    }
    public function nguoidung_store(Request $res)
    {
        nguoidung::create(['HoTen'=>$res->HoTen,'DiaChi'=>$res->DiaChi, 'NgayTao'=>$res->NgayTao, 'DienThoai'=>$res->DienThoai, 'Anh'=>$res->Anh, 'Email'=>$res->Email, 'TrangThai'=>$res->TrangThai,'UserName'=>$res->UserName,'PassWord'=>$res->PassWord,]);
        return redirect()->route('admin.nguoidung.index');
    }

    //Khách hàng
    public function khachhang_index()
    {
        $kh = khachhang::all();

        return view('admin.khachhang.index',['khachhang'=>$kh]);
    }
    public function khachhang_delete($id)
    {
        khachhang::find($id)->delete();
        return redirect()->route('admin.khachhang.index');
    }
    public function khachhang_show($id)
    {
        $db = khachhang::find($id);
        return view('admin.khachhang.edit',['khachhangs'=>$db]);
    }
    public function khachhang_update($id,Request $res)
    {
        khachhang::find($id)->update(['id'=>$id,'HoVaTen'=>$res->HoVaTen,'DiaChi'=>$res->DiaChi, 'SoDienThoai'=>$res->SoDienThoai,  'Email'=>$res->Email, 'UserName'=>$res->UserName,'PassWord'=>$res->PassWord,]);
        return redirect()->route('admin.khachhang.index');
    }
    public function khachhang_new()
    {
        $db = new khachhang();
        return view('admin.khachhang.add',['khachhangs'=>$db]);
    }
    public function khachhang_store(Request $res)
    {
        khachhang::create(['HoVaTen'=>$res->HoVaTen,'DiaChi'=>$res->DiaChi, 'SoDienThoai'=>$res->SoDienThoai,  'Email'=>$res->Email, 'UserName'=>$res->UserName,'PassWord'=>$res->PassWord,]);
        return redirect()->route('admin.khachhang.index');
    }

    //hóa đơn bán
    public function hoadonban_index()
    {
        $list = HoaDonBan::join('KhachHang','KhachHang.id','=','HoaDonBan.MaKhachHang')->select('HoaDonBan.*','KhachHang.HoVaTen')->where('HoaDonBan.TrangThai','=',0)->get();
        return view('admin.hoadonban.index', ['listhdb' => $list]);
    }


    public function hoadonban_detail($id){
        $hdb = HoaDonBan::find($id);

        $thongtinkhachhang = KhachHang::find($hdb->MaKhachHang);

        $laymasp = ChiTietHoaDonBan::where('MaHoaDon','=',$id)->get();


        $danhsachsanpham = [];
        foreach ($laymasp as $value) {
            $sp = sanpham::join('ChiTietHoaDonBan', 'sanpham.id', '=', 'ChiTietHoaDonBan.MaSanPham')->where('chitiethoadonban.MaSanPham','=',$value['MaSanPham'])->where('chitiethoadonban.MaHoaDon','=',$value['MaHoaDon'])->get();
            $danhsachsanpham[] = $sp;
        }


        return view('admin.hoadonban.detail',compact('thongtinkhachhang','danhsachsanpham','hdb'));
    }
    public function delete($id){
        HoaDonBan::destroy($id);
        return redirect()->route('hoadonban.index');
    }
}
