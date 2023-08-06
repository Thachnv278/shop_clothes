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
			<form class="col mb-3" action="{{ route('updatecart') }}" method="POST">
				@csrf
				
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
					<th>Thao tác</th>
				 </tr>
			  </thead>
			  <tbody>
				@if (Auth()->check())
				@php
					 $total = 0;
				@endphp
				@if (session('cart'))
				@foreach (session('cart') as $key => $item)
				@php
					 $total += $item['price'] * $item['quantity'];
				@endphp
				 <tr>
					
					<td>{{ $loop->index + 1 }}</td>
					<td>{{ $item['name']}}</td>
					<td> <img src="{{ $item['image'] ? '' . Storage::url($item['image']) : '' }}" width="50px"></td>
					<td>{{ $item['price'] }}</td> 
					<td>	<div class="wrap-num-product flex-w m-l-auto m-r-0">
						<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
							 <i class="fs-16 zmdi zmdi-minus"></i>
						</div>

						<input class="mtext-104 cl3 txt-center num-product" type="number"
							 name="quantity[{{ $key }}]"
							 value="{{ $item['quantity'] }}">

						<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
							 <i class="fs-16 zmdi zmdi-plus"></i>
						</div>
				  </div></td>

				  <td><div style="background-color: {{ $item['color']}}; width: 50px; height: 50px"></div></td>
					<td>{{ $item['size'] }}</td>
					<td>{{ number_format($item['price'] * $item['quantity'])}}</td>
					<td><a href="{{route('deletecart',['id'=>$key])}} " class="btn btn-danger">xóa</a></td>
				 </tr>
				 @endforeach
				@endif

				 @endif
				 
			  </tbody>
			</table>
			<div class="col text-end">
				<button class="btn btn-primary ">Cập nhật giỏ hàng</button>
			 </div>
			</form>
	  
			<div class="row p-5">
			  <div class="col">
				 <a href="{{route('home')}}" class="btn btn-primary">Tiếp tục mua hàng</a>
			  </div>
			  
			  <div class="col text-end">
				 <b>Tổng tiền: {{ number_format($total) }}</b> 
				 <a href="{{ route('checkout')}}" class="btn btn-success">Thanh toán</a>
			  </div>
			</div>
	  
		 </div>

    </div>
@endsection
