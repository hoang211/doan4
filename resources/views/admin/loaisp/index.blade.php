@extends('admin.app')
@section('content')
<h1>day la trang quan ly loai san pham</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    @php
        $dem =1;
    @endphp
    <div class="card-body">
        <a href="{{route('admin.loaisp.new')}}" class="btn btn-primary">Them moi</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>TT</th>
                        <th>Tên Loại</th>
                        <th>Mô Tả</th>
                        <th>Sua</th>
                        <th>Xoa</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($loaisp as $sp)
                    <tr>

                        <td>{{$dem++}}</td>
                        <td>{{$sp->TenLoai}}</td>
                        <td>{{$sp->MoTa}}</td>
                        <td><a href="{{route('admin.loaisp.show',$sp)}}" class="btn btn-info">Sua</a></td>
                        <td><a onclick="return confirm('Bạn có muốn xóa thật không?');" href="{{route("admin.loaisp.delete",$sp)}}" class="btn btn-danger">Xoa</a></td>

                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
