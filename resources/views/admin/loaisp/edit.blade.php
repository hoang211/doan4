@extends('admin.app')
@section('content')
<h1>Sửa loại sản phẩm</h1>
<form action="{{route('admin.loaisp.update',$loaisp)}}" method="post">
    <p>Mã Loại : <input type="text" name="id" id="id" value="{{$loaisp->id}}" readonly disabled></p>
    <p>Tên Loại: <input type="text" name="TenLoai" id="TenLoai" value="{{$loaisp->TenLoai}}" ></p>
    <p>Mô tả: <input type="text" name="MoTa" id="Delet" value="{{$loaisp->MoTa}}" ></p>
    @csrf
    <p><Button type="submit" class="btn btn-primary">Cap nhat</Button></p>
</form>
@endsection
