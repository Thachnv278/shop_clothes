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


        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 style="border-bottom: 2px solid #007bff; padding-bottom: 10px;">Hóa đơn bán hàng</h1>
                </div>
            </div>



            <div class="row mt-4">
                <div class="col-6"> <strong>Thông tin khách hàng</strong><br> <span style="color: #6c757d;">Tên:
                        {{ $bill->name }}</span><br>
                    <span style="color: #6c757d;">Địa chỉ: {{ $bill->address }}</span><br> <span
                        style="color: #6c757d;">SĐT: {{ $bill->phone }}</span><br>
                    <span style="color: #6c757d;">Email: {{ $bill->email }}</span>
                </div>
                <div class="col-6 text-end">
                    <strong>Thông tin hóa đơn</strong><br>
                    <span style="color: #6c757d;">Ngày đặt: {{ $bill->created_at}}</span><br>
                    
                </div>
            </div>
            <div class="container mt-3">
               <table class="table table-bordered">
                   <thead>
                       <tr>
                           <th>Id</th>
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
                       @foreach ($billdetail as $detail)
                       <tr>
   
                        <td>{{ $detail->id}}</td>
                        <td>{{ $detail->product->name }}</td>
                        <td> <img src="{{ $detail->product->image ? '' . Storage::url($detail->product->image) : '' }}"
                                width="120px"></td>
                        <td>{{ $detail->price }}</td>
                        <td>{{ $detail->quantity }}</td>

                        <td>
                            <div style="background-color: {{ $detail->color }}; width: 50px; height: 50px"></div>
                        </td>
                        <td>{{ $detail->size }}</td>
                        <td>{{ $detail->total }}</td>

                    </tr>
                       @endforeach
                               
                        
   
                   </tbody>
               </table>
           </div>
            <div class="row">
                <div class="col-12 text-end"> <strong style="color: #28a745;">Tổng cộng: {{ $bill->total}}</strong> </div>
            </div>
            <div class="row mt-4">
               
                
            </div>
        </div>
    @endsection
