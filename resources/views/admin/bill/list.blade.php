@extends('layout.admin')
@section('content')
<div class="content p-5">
<div class="container-fluid py-4">

   <div class="row">
     <div class="col-12">
       <div class="card mb-4">
         <div class="card-header pb-0">
           <h6>Bill</h6>
         </div>
         <div class="card-body px-0 pt-0 pb-2">
           <div class="table-responsive p-0">
             <table class="table align-items-center mb-0">
               <thead>
                 <tr>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên</th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Số điện thoại</th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Địa chỉ</th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Chi tiết</th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tình trạng</th>
                   <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thao Tác</th>
                 </tr>
               </thead>
               @foreach ($Bill as $Bill)
               <tbody>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                        <h6 class="mb-0 text-sm">{{ $Bill->id }}</h6>
                    </div>
                  </td>
                  <td>
                    <h6 class="mb-0 text-sm">{{ $Bill->name}}</h6>
                  </td>
                  
                  <td>
                     <h6 class="mb-0 text-sm">{{ $Bill->phone}}</h6>
                   </td>
                   <td>
                     <h6 class="mb-0 text-sm">{{ $Bill->address}}</h6>
                   </td>
                   <td>
                    <a href="{{ route('listBillDetail',$Bill->id)}}"> <button class="btn bg-gradient-primary  mb-2 ms-2" data-class="bg-white" >Chi tiết</button></a>
                  </td>
                  <td>
                    <h6 class="mb-0 text-sm">@if ($Bill->status == 0)
                       đang chuẩn bị hàng
                    @elseif ($Bill->status == 1)
                       đang giao hàng
                    @elseif ($Bill->status == 2)
                       giao hàng thành công
                       
                    @endif</h6>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <a href="{{ route('editBill',$Bill->id)}}"> <button class="btn bg-gradient-primary  mb-2 ms-2" data-class="bg-white" >cập nhật</button></a>
                
                  </td>
                </tr>
              </tbody>
                 
               @endforeach
               
             </table>
           </div>
         </div>
       </div>
       <a href="{{ route('addBrand') }}"><button type="button" class="btn btn-primary"> Thêm thương hiệu</button></a>
       <hr>
     </div>
   </div>
  
   <footer class="footer pt-3  ">
     <div class="container-fluid">
       <div class="row align-items-center justify-content-lg-between">
         <div class="col-lg-6 mb-lg-0 mb-4">
           <div class="copyright text-center text-sm text-muted text-lg-start">
             © <script>
               document.write(new Date().getFullYear())
             </script>,
             made with <i class="fa fa-heart"></i> by
             <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
             for a better web.
           </div>
         </div>
         
       </div>
     </div>
   </footer>
 </div>
</div>
@endsection
