<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                            <li>Giao hàng miễn phí cho tất cả đơn hàng $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="img/language.png" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">Spanis</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                        <div class="header__top__right__auth">
                            {{-- <a href="/login"><i class="fa fa-user"></i> Login</a> --}}
                            @php
                            $listkh = session()->get('khachhang',[]);
                        @endphp
                        @if (count($listkh)>0)
                            <a href="{{ route('loginuser') }}">Xin chào, {{ $listkh['HoVaTen']}}</a>
                            <a href="{{ route('logoutuser') }}">Logout</a>
                        @else
                            <a class="fa fa-user" href="{{ route('loginuser') }}"> Login</a>
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="/"><img src="/upload/logo.webp" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="/">Trang Chủ</a></li>
                        <li><a href="/shop/{id}}">Sản Phẩm</a></li>
                        <li><a href="#">Trang</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="/detail">Chi tiết</a></li>
                                <li><a href="/cart">Giỏ Hàng</a></li>
                                <li><a href="/thanhtoan">Thanh Toán</a></li>
                                {{-- <li><a href="./blog-details.html">Blog Details</a></li> --}}
                            </ul>
                        </li>
                        <li><a href="/blog">Tin Tức</a></li>
                        <li><a href="/contact">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li><a href="{{ route('cart.list') }}"><i class="fa fa-shopping-bag"></i> <span>{{ Cart::getTotalQuantity()}}</span></a></li>
                    </ul>
                    {{-- <div class="header__cart__price">item: <span>$150.00</span></div> --}}
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
