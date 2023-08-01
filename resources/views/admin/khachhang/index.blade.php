@extends('admin.app')

@section('content')
    <section>
        <div class="card">
            <div class="card-header d-inline">
              <h1 class="float-left card-title">Thông tin người dùng</h1>
              <a href="{{route('admin.khachhang.new')}}" class="float-right btn btn-info">Thêm <i class="ml-2 fa fa-plus"></i> </a>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Mã người dùng</th>
                    <th>Tên khách hàng </th>
                    <th>UserName</th>
                    <th>PassWord</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                @foreach($khachhang as $kh)
                <tr>
                    <td>{{ $kh ->  id}}</td>
                    <td>{{$kh->HoVaTen}}</td>
                    <th>{{ $kh ->UserName }}</th>
                    <th>{{ $kh ->PassWord }}</th>
                    <td>{{ $kh ->  SoDienThoai}}</td>
                    <td>{{ $kh ->  Email}}</td>
                    <td>{{ $kh->DiaChi }}</td>
                    <td> <div class="d-flex">
                      <a href="" class="btn btn-primary mr-1">
                          <i class="fa fa-eye"></i>
                      </a>
                      <a  href="{{route('admin.khachhang.show',$kh)}}" class="btn btn-success mr-1"><i class="fa fa-pen"></i></a>
                      <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{route("admin.khachhang.delete",$kh)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      </div></td>
                    @endforeach

                </tr>

                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>

      </section>

      <!-- Main content -->
      <section class="content">
      </section>
      <!-- /.content -->
    </section>

@endsection
