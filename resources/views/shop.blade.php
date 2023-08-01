@extends('homemaster')
@section('content')

 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="/upload/vip.gif">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="/index">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{ URL::to('/nguoidung/index') }}">Home</a>
                <a class="breadcrumb-item text-dark" href="{{ URL::to('/nguoidung/index') }}">Shop</a>
                @foreach ($category_name as $key=>$category_head)
                    <span class="breadcrumb-item active">{{ $category_head->TenLoai }}</span>
                @endforeach
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-4">
            @foreach ($category_name as $key=>$category_name)
            <h3 class="section-title position-relative text-uppercase mb-3"><span class="">{{ $category_name->TenLoai }}</span></h3>
            @endforeach
            <div class="bg-light p-4 mb-30">

                <form>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" checked id="price-all">
                        <label class="custom-control-label" for="price-all">All Price</label>
                        {{-- <span class="badge border font-weight-normal">1000</span> --}}
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                            <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                        </div>
                        <div class="ml-2">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                            <div class="btn-group ml-2">
<button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">10</a>
                                    <a class="dropdown-item" href="#">20</a>
                                    <a class="dropdown-item" href="#">30</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($category_by_id as $key=>$sp)
                        <div class="col-lg-4 col-md-4 col-sm-6 mix oranges fresh-meat">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg" data-setbg="/upload/{{ $sp->Anh }}">
                                    {{-- <ul class="featured__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul> --}}
                                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $sp->id }}" name="id">
                                        <input type="hidden" value="{{ $sp->TenSanPham }}" name="name">
                                        <input type="hidden" value="{{ $sp->GiaBan }}" name="price">
                                        <input type="hidden" value="{{ $sp->Anh }}"  name="image">
                                        <input type="hidden" value="1" name="quantity">


                                            <ul class="featured__item__pic__hover">

                                                <button class="fa fa-shopping-cart">Add To Cart</button>
                                                <button class="fa fa-eye">View Detail</button>
                                            </ul>


                                    </form>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="">{{ $sp->TenSanPham }}</a></h6>
                                    <h5>${{ $sp->GiaBan }}</h5>
                                </div>
                            </div>
                        </div>
                @endforeach
                <div class="col-12">
                    {{-- <nav>
                      <ul class="pagination justify-content-center">
<li class="page-item disabled"><a class="page-link" href="#">Previous</span></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                      </ul>
                    </nav> --}}
                    {{ $category_by_id->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

    </div>

</div>
@endsection








