@extends('homemaster')
@php
    $index = 1;
@endphp
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;

}

td, th {
  /* border: 1px solid #ffffff; */
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #97cff2;
}
}
</style>
@section('content')
    <div class="container px-6 mx-auto">
        <h1 class="text-2xl font-medium text-gray-700" style="text-align: center; color:darkorchid">Danh sách đơn hàng</h1>
        <table class="table table-bordered">
            <thead>
                <tr style="background-color: #97cff2;">
                    <th>TT</th>
                    <th>Mã khách hàng</th>
                    <th>Ngày tạo</th>
                    <th>Địa chỉ nhận</th>
                    <th>Trạng thái</th>
                    <th>Mô tả</th>
                    <th>Tổng tiền</th>
                    <th>Chi tiet</th>
                    <th>Duyet</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donhang as $item)
                    <tr>
                        <td>{{$index++}}</td>
                        <td>{{$item->MaKhachHang}}</td>
                        <td>{{$item->NgayTao}}</td>
                        <td>{{$item->DiaChiNhan}}</td>
                        <td>{{$item->TrangThai}}</td>
                        <td>{{$item->MoTa}}</td>
                        <td>{{$item->TongTien}}</td>
                        <td><a href="{{route('cart.qldonhangchitiet',$item->id)}}">Chi tiet</a></td>
                        <td><a href="{{route('cart.qlddonhang') }}">Duyet</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
