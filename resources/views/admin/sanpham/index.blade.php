@extends('admin.app')
@section('content')
<h1>Đây là trang quản lý sản phẩm</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    @php
        $dem =1;
    @endphp
    <div class="card-body">
        <a href="{{route('admin.sanpham.new')}}" class="btn btn-primary">Them moi</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>TT</th>
                        <th>Tên san phẩm</th>
                        <th>Ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá bá<nav></nav></th>
                        <th>Mô tả</th>
                        {{-- <th>Chi tiết sản phẩm</th> --}}
                        <th>Sửa</th>
                        <th>Xóa</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($sanphams as $sp)
                    <tr>

                        <td>{{$dem++}}</td>
                        <td>{{$sp->TenSanPham}}</td>
                        <td><img src="/upload/{{$sp->Anh}}" style="width:150px"></td>
                        <td>{{$sp->SoLuong}}</td>
                        <td>{{$sp->GiaBan}}</td>
                        <td>{{$sp->MoTa}}</td>
                        {{-- <td>{{$sp->ChiTietSanPham}}</td> --}}
                        <td><a href="{{route('admin.sanpham.show',$sp)}}" class="btn btn-info">Sửa</a></td>
                        <td><a onclick="return confirm('Bạn có muốn xóa thật không?');" href="{{route('admin.sanpham.delete',$sp)}}" class="btn btn-danger">Xóa</a></td>

                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
