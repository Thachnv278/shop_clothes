@extends('layout.admin')
@section('content')
<div class="content p-5">
<div class="container-fluid py-4">

   <div class="row">
     <div class="col-12">
       <div class="card mb-4">
         <div class="card-header pb-0">
           <h6> chi tiết Sản phẩm</h6>
         </div>
         <div class="card-body px-0 pt-0 pb-2">
           <div class="table-responsive p-0">
             <table class="table align-items-center mb-0">
               <thead>
                 <tr>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã chi tiết sản phẩm</th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên Sản Phẩm</th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Màu</th>
                   <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Size</th>
                   <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Giá</th>
                   <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Số lượng</th>
                   <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                 </tr>
               </thead>
               @foreach ($Detail as $Detail)
               <tbody>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                        <h6 class="mb-0 text-sm">{{ $Detail->id }}</h6>
                    </div>
                  </td>
                  <td>
                    <h6 class="mb-0 text-sm">{{ $Detail->product->name}}</h6>
                  </td>
                  <td>
                    <div style="background-color: {{ $Detail->color}}; width: 50px; height: 50px;"></div>
                    {{-- <h6 class="mb-0 text-sm">{{ $Detail->color}}</h6> --}}
                  </td>
                  <td>
                     <h6 class="mb-0 text-sm">{{ $Detail->size}}</h6>
                   </td>
                   <td>
                    <h6 class="mb-0 text-sm">{{ $Detail->price}}</h6>
                  </td>
                  <td>
                     <h6 class="mb-0 text-sm">{{ $Detail->quantity}}</h6>
                   </td>
                  <td class="align-middle text-center text-sm">
                    <a href="{{route('editDetail',['id'=>$Detail->id])}}"> <button class="btn bg-gradient-primary  mb-2 ms-2" data-class="bg-white" >Sửa</button></a>
                    <a href="{{route('deleteDetail',['id'=>$Detail->id])}}"> <button class="btn bg-gradient-primary  mb-2 ms-2" data-class="bg-white" >Xóa</button></a>
                  </td>
                </tr>
              </tbody>
                 
               @endforeach
               
             </table>
           </div>
         </div>
       </div>
       <a href="{{route('listProduct')}}"><button type="button" class="btn btn-primary"> Danh sách sản phẩm</button></a>
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
