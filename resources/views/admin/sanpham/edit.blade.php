@extends('admin.app')
@section('content')
<h1>Sửa sản phẩm</h1>
<form action="{{route('admin.sanpham.update',$sanpham)}}" method="post">
    <p>Mã sp: <input type="hidden" name="id" id="id" value="{{$sanpham->id}}" ></p>
    <p>Tên sp: <input type="text" name="TenSanPham" id="TenSanPham" value="{{$sanpham->TenSanPham}}" ></p>
    <p>Ảnh: <input type="file" name="Anh" id="Anh" value="{{$sanpham->Anh}}" ></p>
    <p>Mã loại: <input type="text" name="MaLoai" id="MaLoai" value="{{$sanpham->MaLoai}}" ></p>
    <p>Mô Tả: <input type="text" name="MoTa" id="TenLMoTaoai" value="{{$sanpham->MoTa}}" ></p>
    <p>Giá bán: <input type="text" name="GiaBan" id="GiaBan" value="{{$sanpham->GiaBan}}" ></p>
    <p>Số Lượng: <input type="text" name="SoLuong" id="SoLuong" value="{{$sanpham->SoLuong}}" ></p>
    <p>ChiTietSanPham: <input type="text" name="ChiTietSanPham" id="ChiTietSanPham" value="{{$sanpham->ChiTietSanPham}}" ></p>
    @csrf
    <p><Button type="submit" class="btn btn-primary">Cap nhat</Button></p>
</form>
@endsection
