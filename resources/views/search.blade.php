@extends('homemaster')
@section('content')
<!-- Breadcrumbs -->
{{-- <div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="/trangchu">Trang chủ<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="#">tìm kiếm</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- End Breadcrumbs -->

<!-- Product Style -->
<section class="product-area shop-sidebar shop section">
    <div class="container">
        <div class="row">
            <h3>Kết quả tìm kiếm cho tên sản phẩm có từ "{{ $keyword }}"</h3>

            @if($products->isEmpty())
                <p>Không tìm thấy sản phẩm phù hợp.</p>
            @else





                <div class="col-lg-12 col-md-8 col-12">
                    <div class="row">

                        @foreach ($products as $sp)
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
                                    <h5>${{ $sp->GiaBan }}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
            @endif

            {{-- <div class="row">
                <div class="col-12" style="margin-left: 600px">
                    {{ $products->links('pagination::bootstrap-4') }}

                </div>

            </div> --}}

        </div>
    </div>
</section>
<!--/ End Product Style 1  -->
@endsection
