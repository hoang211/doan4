@extends('admin.app')
@section('content')
<h1>Thêm loại sản phẩm mới</h1>
<form action="{{route('admin.loaisp.addnew',$loaisp)}}" method="post">
    <p>Mã loại: <input type="hidden" name="id" id="id" value="{{$loaisp->id}}" ></p>
    <p>Tên loại: <input type="text" name="TenLoai" id="TenLoai" value="{{$loaisp->TenLoai}}" ></p>
    <p>Mô tả: <input type="text" name="MoTa" id="MoTa" value="{{$loaisp->MoTa}}" ></p>
    @csrf
    <p><Button type="submit" class="btn btn-primary">Them moi</Button></p>
</form>
@endsection
