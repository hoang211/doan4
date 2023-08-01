@extends('admin.app')
@section('content')
<h1>Sửa thông tin khách hàng mới</h1>
<form action="{{route('admin.khachhang.update',$khachhangs)}}" method="post">
    <p>Mã người dùng: <input type="hidden" name="id" id="id" value="{{$khachhangs->id}}" ></p>
    <p>UserName: <input type="text" name="UserName" id="UserName" value="{{$khachhangs->UserName}}" ></p>
    <p>PassWord: <input type="text" name="PassWord" id="PassWord" value="{{$khachhangs->PassWord}}" ></p>
    <p>Họ và tên: <input type="text" name="HoVaTen" id="HoVaTen" value="{{$khachhangs->HoVaTen}}" ></p>
    <p>Số điện thoại: <input type="text" name="SoDienThoai" id="SoDienThoai" value="{{$khachhangs->SoDienThoai}}" ></p>
    <p>Email: <input type="text" name="Email" id="Email" value="{{$khachhangs->Email}}" ></p>
    <p>Địa Chỉ: <input type="text" name="DiaChi" id="DiaChi" value="{{$khachhangs->DiaChi}}" ></p>
    @csrf
    <p><Button type="submit" class="btn btn-primary">Sửa</Button></p>
</form>
@endsection
