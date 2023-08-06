@extends('layout.client')
@section('content')
    <div class="content p-5">
        <!-- breadcrumb -->
        <div class="container">
            <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
                <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
                    Home
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                </a>

                <span class="stext-109 cl4">
                    Shoping Cart
                </span>
            </div>
        </div>


        {{-- giỏ hàng --}}

        <div class="container mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>màu</th>
                        <th>kích cỡ</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @if (Auth()->check())
                        @php
                            $total = 0;
                        @endphp
                        @foreach (session('cart') as $key => $item)
                            @php
                                $total += $item['price'] * $item['quantity'];
                            @endphp
                            <tr>

                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td> <img src="{{ $item['image'] ? '' . Storage::url($item['image']) : '' }}"
                                        width="50px"></td>
                                <td>{{ $item['price'] }}</td>
                                <td>{{ $item['quantity'] }}</td>

                                <td>
                                    <div style="background-color: {{ $item['color'] }}; width: 50px; height: 50px"></div>
                                </td>
                                <td>{{ $item['size'] }}</td>
                                <td>{{ number_format($item['price'] * $item['quantity']) }}</td>

                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>

        <div class="container mt-5">

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Thông tin thanh toán
                        </div>
                        @if (session('total'))
                        @php
                            $total = session('total');
                            // session()->forget('total');
                           
                        @endphp
                    @endif
                        <div class="card-body">
                          
                            <form method="POST" action="{{ route('billadd') }}">
                                @csrf
                                @if ($errors->any())

                                <div class="alert alert-danger alert-dismissible" role="alert">
                                
                                <ul>
                                
                                @foreach ($errors->all() as $error)
                                
                                <li>{{ $error }}</li>
                                
                                @endforeach
                                
                                </ul>
                                
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                
                                </div>
                                
                                @endif
                              
                         
                                <input type="hidden" name="total" value="{{ $total + 30000 }}">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Họ tên</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name ="phone">
                                </div>

                                <div class="mb-3">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" name="address">
                                </div>



                                <hr>

                               

                             
                                <button type="submit" class="btn btn-primary">Xác nhận</button>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Đơn hàng ({{ count(session('cart')) }} sản phẩm)
                        </div>
                        <div class="card-body">


                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Tổng</span>
                                    <strong>{{ number_format($total) }} vnđ</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Phí vận chuyển</span>
                                    <strong>30,000 vnđ</strong>
                                </li>
                                
                                <li class="list-group-item d-flex justify-content-between">
                                    <form action="{{ route('saleadd') }}" method="POST">
                                        @csrf
                                    <span>Mã giảm giá</span>
                                    <div class="d-flex gap-3">
                                        <input type="hidden" name="total" value="{{ $total }}">
                                        <input type="text" name="sale"  class="form-control ">
                                        <button class="btn btn-success">nhập</button>
                                    </div>
                                </form>
                                </li>

                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="text-primary">Tổng cộng</span>
                                    <strong class="text-primary">
                                       
                                        {{ number_format($total + 30000) }} vnđ</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
