
@php
    $index = 1;
@endphp
<style>
    .layout{
    margin-left: 230px
    }
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
<div class="layout" style="width:800px;mag">
    <table>
        <tr>
            <td>
              <img style="width:150px;float:left" src="/upload/logo.webp" alt="">

            </td>

        </tr>
    </table>
    <h1 style="text-align: center;color:darkorchid">Đơn Hàng</h1>
    <p>Tên khách hàng: {{$donhang->name}}</p>
    <p>Số điện thoại: {{$donhang->phone}}</p>
    <p>Địa chỉ giao hàng: {{$donhang->address}}</p>
    <p>Email: {{$donhang->email}}</p>
    <div class="container px-6 mx-auto">
        <h3 class="text-2xl font-medium text-gray-700">Danh sách sản phẩm</h3>
        <table class="table table-bordered">
            <thead>
                <tr style="text-align: center">
                    <th>TT</th>
                    <th>Anh</th>
                    <th>Ten san pham</th>
                    <th>So luong</th>
                    <th>Don gia</th>
                    <th>Thanh tien</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($chitiet as $item)
                    <tr>
                        <td>{{$index++}}</td>
                        <td><img src='{{$item->image}}' style="width: 100px" /></td>
                        <td>{{$item->Product->name}}</td>
                        <td>{{$item->soluong}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->soluong*$item->price}}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3>Tổng tiền đơn hàng: {{$donhang->total}}</h3>
    </div>

</div>
