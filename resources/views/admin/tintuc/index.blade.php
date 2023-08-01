@extends('admin.app')
@section('content')
<h1>Đây là trang quản lý tin tức</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    @php
        $dem =1;
    @endphp
    <div class="card-body">
        <a href="{{route('admin.tintuc.new')}}" class="btn btn-primary">Them moi</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>TT</th>
                        <th>Tiêu đề</th>
                        <th>Ngày tạo</th>
                        <th>Nội dung</th>
                        <th>Ảnh</th>
                        <th>Mã người dùng</th>
                        <th>Trạng thái</th>
                        <th>Sửa</th>
                        <th>Xóa</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($tintuc as $sp)
                    <tr>

                        <td>{{$dem++}}</td>
                        <td>{{$sp->TieuDe}}</td>
                        <td>{{$sp->NgayTao}}</td>
                        <td>{{$sp->NoiDung}}</td>
                        <td><img src="/upload/{{$sp->Anh}}" style="width:150px"></td>
                        <td>{{$sp->MaNguoiDung}}</td>
                        <td>{{$sp->Trangthai}}</td>
                        <td><a href="" class="btn btn-info">Sửa</a></td>
                        <td><a onclick="return confirm('Bạn có muốn xóa thật không?');" href="" class="btn btn-danger">Xóa</a></td>

                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
