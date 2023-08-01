@extends('admin.app')
@section('content')
<h1>Thêm khách hàng mới</h1>
<form action="{{route('admin.nguoidung.addnew',$nguoidungs)}}" method="post">
    <p>Mã người dùng: <input type="hidden" name="id" id="id" value="{{$nguoidungs->id}}" ></p>
    <p>UserName: <input type="text" name="UserName" id="UserName" value="{{$nguoidungs->UserName}}" ></p>
    <p>PassWord: <input type="text" name="PassWord" id="PassWord" value="{{$nguoidungs->PassWord}}" ></p>
    <p>Ngày tạo: <input type="date" name="NgayTao" id="NgayTao" value="{{$nguoidungs->NgayTao}}" ></p>
    <p>Ảnh: <input type="file" name="Anh" id="Anh" value="{{$nguoidungs->Anh}}"></p>
    <p>Họ và tên: <input type="text" name="HoTen" id="HoTen" value="{{$nguoidungs->HoTen}}" ></p>
    <p>Số điện thoại: <input type="text" name="DienThoai" id="DienThoai" value="{{$nguoidungs->DienThoai}}" ></p>
    <p>Email: <input type="text" name="Email" id="Email" value="{{$nguoidungs->Email}}" ></p>
    <p>Địa Chỉ: <input type="text" name="DiaChi" id="DiaChi" value="{{$nguoidungs->DiaChi}}" ></p>
    <p>Trang Thái: <input type="radio" name="TrangThai" id="TrangThai" value="{{$nguoidungs->TrangThai}}" ></p>
    @csrf
    <p><Button type="submit" class="btn btn-primary">Them moi</Button></p>
</form>
@endsection
