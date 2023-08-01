@extends('admin.app')
@section('content')
<h1>Thêm tin tức mới</h1>
<form action="{{route('admin.tintuc.addnew',$tintucs)}}" method="post">
    <p>Mã tin: <input type="hidden" name="id" id="id" value="{{$tintucs->id}}" ></p>
    <p>Tiêu đề: <input type="text" name="TieuDe" id="TieuDe" value="{{$tintucs->TieuDe}}" ></p>
    <p>Ngày tạo: <input type="date" name="NgayTao" id="NgayTao" value="{{$tintucs->NgayTao}}" ></p>
    <p>Nội dung: <input type="text" name="NoiDung" id="NoiDung" value="{{$tintucs->NoiDung}}" ></p>
    <p>Ảnh: <input type="file" name="Anh" id="Anh" value="{{$tintucs->Anh}}" ></p>
    <p>Mã người dùng: <input type="text" name="MaNguoiDung" id="MaNguoiDung" value="{{$tintucs->MaNguoiDung}}" ></p>
    <p>Trang Thái: <input type="radio" name="TrangThai" id="TrangThai" value="{{$tintucs->TrangThai}}" ></p>
    @csrf
    <p><Button type="submit" class="btn btn-primary">Them moi</Button></p>
</form>
@endsection
