@php
    $index = 1;
@endphp
<style>
    tr{
        text-align: center;
    }
    </style>
@extends('homemaster')
    @section('content')
     <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="/upload/vip.gif">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="/index">Home</a>
                        <span>Cart</span>
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
                <a class="breadcrumb-item text-dark" href="{{ URL::to('/nguoidung/index') }}">Cart</a>

            </nav>
        </div>
    </div>
</div>
              <main class="my-8">
                <div class="container px-6 mx-auto">
                    <div class="flex justify-center my-6">
                        <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                          @if ($message = Session::get('success'))
                              <div class="p-4 mb-3 bg-green-400 rounded">
                                  <p class="text-green-800">{{ $message }}</p>
                              </div>
                          @endif
                            <h2 class="text-3xl text-bold">Cart List</h2>
                          <div class="flex-1">
                            <table class="table table-light table-borderless table-hover text-center mb-0" enctype="multipart/form-data">
                                <thead style="background-color: #97cff2">
                                    <tr>
                                        <th>TT</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Ảnh</th>
                                        <th>Giá Tiền</th>
                                        <th>Số Lượng</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                  <tr>
                                    <td>{{$index++}}</td>
                                    <td>

                                          <p class="mb-2 md:ml-4">{{ $item->name }}</p>


                                      </td>
                                    <td class="hidden pb-4 md:table-cell">

                                        <img style="width: 150px;" src="{{URL::to('/upload/'.$item->attributes->image)}}" class="w-20 rounded" alt="Thumbnail">

                                    </td>


                                    <td class="hidden pb-4 md:table-cell">
                                      <span class="text-sm font-medium lg:text-base">
                                          ${{ $item->price }}
                                      </span>
                                    </td>

                                    <td class="justify-center mt-6 md:justify-end md:flex">
                                        <div class="h-10 w-28">
                                          <div class="relative flex flex-row w-full h-8">

                                            <form action="{{ route('cart.update') }}" method="POST">
                                              @csrf
                                              <input type="hidden" name="id" value="{{ $item->id}}" >
                                            <input type="number" min="1" name="quantity" value="{{ $item->quantity }}"
                                            class="w-6 text-center bg-gray-300" />
                                            <button type="submit" class="class="btn btn-info btn-sm">update</button>
                                            </form>
                                          </div>
                                        </div>
                                      </td>
                                    <td class="hidden pb-4 md:table-cell">
                                      <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="btn btn-sm btn-danger"  onclick="return confirm('Bạn có thực sự muốn xóa')">x</button>
                                    </form>

                                    </td>
                                  </tr>
                                  @endforeach

                                </tbody>

                            </table>
                            <div>
                            <h3> Total: ${{ Cart::getTotal() }}</h3>
                            <p><a  href="{{route('cart.thanhtoan')}}" class="btn btn-primary">Thanh toan</a>
                            </div>
                            <div>
                              <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-danger"  onclick="return confirm('Bạn có thực sự muốn xóa')">Remove All Cart</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </main>
        @endsection









