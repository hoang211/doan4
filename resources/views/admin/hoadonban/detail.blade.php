<!DOCTYPE html>
<html>
<head>
	<title>Hóa đơn bán hàng</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				{{-- <div class="card">
					<div class="card-header">
						Thông tin khách hàng
					</div>
					<div class="card-body">
						<p>Tên khách hàng: {{ $thongtinkhachhang -> HoVaTen }}</p>
						<p>Địa chỉ: {{ $thongtinkhachhang -> DiaChi }}</p>
						<p>Email: {{ $thongtinkhachhang -> Email }}</p>
						<p>Số điện thoại: {{ $thongtinkhachhang -> SoDienThoai }}</p>
					</div>
				</div>
				<br> --}}
				<div class="card">

                    <div style="margin-left: 20px">
                        <img style="width:200px" src="/upload/logo.webp" alt="">
                        <p>Địa chỉ : Yên Tập - Mỹ Hào - Hưng Yên</p>
                        <p>Điện thoại : 0336664012</p>
                        <p>Email : nvhoang021102@gmail.com</p>
                    </div>
                    <h1 style="text-align: center">Hóa đơn bán hàng</h1>
					<div class="card-header">
						Thông tin sản phẩm
					</div>
					<div class="card-body">
						<table class="table">
							<thead>
								<tr style="text-align: center">
									<th>Mã sản phẩm</th>
                                    <th>Ảnh</th>
									<th>Tên sản phẩm</th>
									<th>Đơn giá</th>
									<th>Số lượng</th>
									<th>Thành tiền</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($danhsachsanpham as $id => $item)
                                <tr style="text-align: center">
                                    <td>{{ $item[0]['id'] }}</td>
                                    <td><img src="/upload/{{ $item[0]['Anh'] }}" style="width:150px"></td>
                                    <td>{{ $item[0]['TenSanPham'] }}</td>
                                    <td>{{ number_format($item[0]['GiaBan']) .'$'}}</td>
                                    <td>{{ $item[0]['SoLuong'] }}</td>
                                    <td>{{ number_format($item[0]['TamTinh']) . '$'}}</td>
                                </tr>
                                @endforeach


							</tbody>
						</table>
					</div>
                    <div class="card-header">
						Thông tin khách hàng
					</div>
					<div class="card-body">
						<p>Tên khách hàng: {{ $thongtinkhachhang -> HoVaTen }}</p>
						<p>Địa chỉ: {{ $thongtinkhachhang -> DiaChi }}</p>
						<p>Email: {{ $thongtinkhachhang -> Email }}</p>
						<p>Số điện thoại: {{ $thongtinkhachhang -> SoDienThoai }}</p>
					</div>
				</div>
				<br>
				<div class="card">
					<div class="card-header">
						Tổng tiền
					</div>
					<div class="card-body">

						<p>Tổng tiền: {{ number_format($hdb -> TongTien) .'$'}}</p>
					</div>
				</div>
                {{-- <div class="card">
                    <p><a  href="{{route('hoadonban.index')}}" class="btn btn-primary">Quay lai</a>
                </div> --}}
			</div>
		</div>
	</div>
</body>
</html>
