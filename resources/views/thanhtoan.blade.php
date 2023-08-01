{{-- @extends('homemaster')
@section('content')
    <div class="container px-6 mx-auto">
        <h3 class="text-2xl font-medium text-gray-700">Thanh Toán</h3>
        <div class="col-lg-8">
            <form action="{{route('cart.thanhtoan1')}}" method="post">
                <p>Nhập họ tên: <input type="text" name="txtname" id="txtname"></p>
                <p>Nhập số điện thoại: <input type="text" name="txtphone" id="txtphone"></p>
                <p>Nhập Email: <input type="text" name="txtemail" id="txtemail"></p>
                <p>Nhập địa chỉ: <input type="text" name="txtaddress" id="txtaddress"></p>
                @csrf
                <p><button type="submit" class="btn btn-primary">Mua hang</button></p>
            </form>
        </div>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">TỔNG ĐƠN HÀNG</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Tiền Sản Phẩm</h6>
                        <h6>{{number_format(\Cart::getSubtotal(0, ',' , '.')).' '.'vnđ'  }}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Phí Vận Chuyển</h6>
                        <h6>0</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Tổng Tiền</h5>
                        <h5>{{number_format(\Cart::gettotal()).' '.'vnđ'}}</h5>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection --}}

@extends('homemaster')
@section('content')
    <section>
         <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
        <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
                    here to enter your code.</h6>
                </div>
            </div>
            {{-- <form action="{{ route('addbill',['id'=>$listkh['id']]) }}" class="checkout__form" method="POSt"> --}}
            <form  action="{{route('addbill',['id'=>$listkh['id']])}}" method="post" class="checkout__form">

                <div class="row">
                    <div class="col-lg-8">
                        <h5>Billing detail</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Full Name <span>*</span></p>
                                    <input type="text" name="HoVaTen" value="{{ $listkh['HoVaTen'] }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Address <span>*</span></p>
                                    <input type="text" name="DiaChi" value="{{ $listkh['DiaChi'] }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Địa chỉ nhận <span>*</span></p>
                                    <input name="DiaChiNhan" type="text" required>
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Phone <span>*</span></p>
                                    <input name="SoDienThoai" value="{{ $listkh['SoDienThoai'] }}" type="text" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input name="Email" value="{{ $listkh['Email'] }}" type="text" readonly>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__checkbox">
                                    <label for="acc">
                                        Create an acount?
                                        <input type="checkbox" id="acc">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>Create am acount by entering the information below. If you are a returing
                                        customer login at the <br />top of the page</p>
                                    </div>
                                    <div class="checkout__form__input">
                                        <p>Account Password <span>*</span></p>
                                        <input type="text">
                                    </div>
                                    <div class="checkout__form__checkbox">
                                        <label for="note">
                                            Note about your order, e.g, special noe for delivery
                                            <input type="checkbox" id="note">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="checkout__form__input">
                                        <p>Oder notes <span>*</span></p>
                                        <input type="text"
                                        placeholder="Note about your order, e.g, special noe for delivery">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="checkout__order">
                                <h5>Your order</h5>
                                <div class="checkout__order__product">
                                    <ul>

                                        {{-- <li>
                                            <span class="top__text">Product</span>
                                            <span class="top__text__right">Total</span>
                                        </li> --}}
                                        {{-- @foreach ($cart as $item)
                                            <li>{{ $item['productname'] }} <span>{{ number_format($item['price']*$item['quantity']) }}</span></li>
                                        @endforeach --}}
                                    </ul>
                                </div>
                                <div class="checkout__order__total">
                                    <ul>
                                        {{-- <li>Subtotal <span>@php
                                            $sum = 0;
                                            $cart = session()->get('cart');
                                            foreach ($cart as $x) {
                                                $sum += $x['quantity'] * $x['price'];
                                            }
                                            echo number_format($sum).'VNĐ';
                                        @endphp</span></li>
                                        <li>Total <span>@php echo number_format($sum).'VNĐ';
                                            @endphp</span></li> --}}
                                    </ul>
                                    <div class="pt-2">
                                        <div class="d-flex justify-content-between mt-2">
                                            <h5>Tổng Tiền</h5>
                                            <h5>{{number_format(\Cart::getTotal()).' '.'$'}}</h5>
                                        </div>

                                    </div>
                                </div>
                                <div class="checkout__order__widget">
                                    <label for="o-acc">
                                        Create an acount?
                                        <input type="checkbox" id="o-acc">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>Create am acount by entering the information below. If you are a returing customer
                                    login at the top of the page.</p>
                                    <label for="check-payment">
                                        Cheque payment
                                        <input type="checkbox" id="check-payment">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label for="paypal">
                                        PayPal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                @csrf
                                <button onclick="Đặt hàng thành công" type="submit" class="site-btn">Place oder</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Checkout Section End -->

        <!-- Instagram Begin -->

        <!-- Instagram End -->
    </section>
@endsection
