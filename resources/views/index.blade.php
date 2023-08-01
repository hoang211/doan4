@extends('homemaster')
@section('content')
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Danh Mục</span>
                    </div>
                    <ul style=" display: block;">
                        @foreach ($loaisp as $lsp)
                         <a href="{{ URL::to('/shop/'.$lsp->id) }}" class="nav-item nav-link">{{ $lsp ->TenLoai }}</a>
                         @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{ URL::to('/search') }}" method="post">
                            @csrf
                            <div class="hero__search__categories">
                                Tất cả loại đồ chơi
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm">
                            <button type="submit" class="site-btn">Tìm kiếm</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>0336664012</h5>
                            <span>Hỗ trợ 24/7</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
 <!-- Hero Section Begin -->
 <section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-9">
                <div class="hero__item set-bg" data-setbg="upload/banner2.webp">
                    <div class="hero__text">
                        {{-- <span>tiniStore</span>
                        <h2>Đồ Chơi <br />100% An Toàn</h2>
                        <p>Nhận và giao hàng miễn phí</p>
                        <a href="#" class="primary-btn">Mua ngay</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản phẩm nổi bật</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".oranges">Đồ chơi nhập khẩu</li>
                        <li data-filter=".fresh-meat">Đồ chơi nội địa</li>
                        <li data-filter=".vegetables">Đồ chơi tư duy</li>
                        <li data-filter=".fastfood">Đồ chơi mô hình</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach ($sanphams as $sp)
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="/upload/{{ $sp->Anh }}">

                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $sp->id }}" name="id">
                            <input type="hidden" value="{{ $sp->TenSanPham }}" name="name">
                            <input type="hidden" value="{{ $sp->GiaBan }}" name="price">
                            <input type="hidden" value="{{ $sp->Anh }}"  name="image">
                            <input type="hidden" value="1" name="quantity">
                                <ul class="featured__item__pic__hover">

                                    <button style="border-color: #ccc" class="px-4 py-2  bg-blue-800 rounded"> Add to cart</button>
                                </ul>
                        </form>
                        {{-- <form action="{{ URL::to('detail',['id'=>$sp->id]) }}" method="POST" enctype="multipart/form-data">
                        <button class="fa fa-eye">View Detail</button> --}}

                        </form>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{ route('Home.detail',['id'=>$sp->id]) }}">{{ $sp->TenSanPham }}</a></h6>
                        <h5>{{ $sp->GiaBan }}vnđ</h5>
                    </div>
                </div>
            </div>
            @endforeach
            <div style="    margin-left: 44%;">
                {{ $sanphams->links('pagination::bootstrap-4') }}
            </div>

        </div>

    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="assets/img/hero/banner.webp" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="assets/img/hero/banner1.webp" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->

<!-- Latest Product Section End -->

<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>Bài viết mới</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($tintucs as $tt)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="/upload/{{ $tt->Anh }}" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i>{{$tt->NgayTao}}</li>
                            <li><i class="fa fa-comment-o"></i></li>
                        </ul>
                        <h5><a href="#">{{ $tt->TieuDe }}</a></h5>
                        <p>{{$tt->NoiDung}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection
