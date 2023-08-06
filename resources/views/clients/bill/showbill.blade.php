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
            <h1>Danh sách hóa đơn</h1>
            
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>  
                  <th>Ngày</th>
                  <th>Tổng tiền</th>
                  <th>Trạng thái</th>
                  <th>chi tiết</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($bills as $bill) 
                <tr>
                    <td>{{ $bill->id }}</td>
                    <td>{{ $bill->created_at}}</td> 
                    <td>{{ $bill->total}}</td>
                    <td>@if ($bill->status == 0)
                       <span class="text-warning">đang chuẩn bị hàng</span> 
                    @elseif ($bill->status == 1)
                    <span class="text-primary"> đang giao hàng</span>
                    @elseif ($bill->status == 2)
                    <span class="text-success">giao hàng thành công</span>
                        @else
                        <span class="text-danger">đơn hàng đã bị hủy </span>
                    @endif</td>
                    <td><a href="{{route('billdetail',$bill->id)}}" class="btn btn-primary">xem</a></td>
                  </tr>
                @endforeach
               
              </tbody>
            </table>
          </div>
            @endsection
