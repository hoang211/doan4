@extends('admin.app')

@section('content')
    <section>
        <div class="card">
            <div class="card-header d-inline">
              <h1 class="float-left card-title">Thông tin người dùng</h1>
              <a href="{{route('admin.nguoidung.new')}}" class="float-right btn btn-info">Thêm <i class="ml-2 fa fa-plus"></i> </a>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Mã người dùng</th>
                    <th>Ảnh</th>
                    <th>Tên người dùng </th>
                    <th>UserName</th>
                    <th>PassWord</th>
                    <th>Địa chỉ</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                @foreach($nguoidung as $nd)
                <tr>
                    <td>{{ $nd ->  id}}</td>
                    <td><img src="{{ $nd ->Anh }}" style="width:100px;" alt=""></td>
                    <td>{{$nd->HoTen}}</td>
                    <th>{{ $nd ->UserName }}</th>
                    <th>{{ $nd ->PassWord }}</th>
                    <td>{{ $nd ->  DiaChi}}</td>
                    <td>{{ $nd ->  NgayTao}}</td>
                    <td>@if($nd->TrangThai)
                            <p style="color: green">Hoạt động</p>
                        @else
                        <p style="color: red">Không hoạt động</p>
                        @endif
                    </td>
                    <td> <div class="d-flex">
                      <a href="" class="btn btn-primary mr-1">
                          <i class="fa fa-eye"></i>
                      </a>
                      <a  href="{{route('admin.nguoidung.show',$nd)}}" class="btn btn-success mr-1"><i class="fa fa-pen"></i></a>
                      <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{route("admin.nguoidung.delete",$nd)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
