@extends('layout.admin')
@section('content')
<div class="content p-5">
<div class="container-fluid py-4">

   <div class="row">
     <div class="col-12">
       <div class="card mb-4">
         <div class="card-header pb-0">
           <h6>Sản phẩm</h6>
         </div>
         <div class="card-body px-0 pt-0 pb-2">
           <div class="table-responsive p-0">
             <table class="table align-items-center mb-0">
               <thead>
                 <tr>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã Sản Phẩm</th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên Sản Phẩm</th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Giá</th>
                   <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ảnh</th>
                   <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">chi tiết</th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Thương hiệu</th>
                   <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thể loại</th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Thêm thuộc tính </th>
                   <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                 </tr>
               </thead>
               @foreach ($Product as $Product)
               <tbody>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                        <h6 class="mb-0 text-sm">{{ $Product->id }}</h6>
                    </div>
                  </td>
                  <td>
                    <h6 class="mb-0 text-sm">{{ $Product->name}}</h6>
                  </td>
                  <td>
                    <h6 class="mb-0 text-sm">{{ $Product->price}}</h6>
                  </td>
                  <td>
                     <img src="{{ $Product->image?''.Storage::url($Product->image):''}}" style="width: 70px" />
                   </td>
                  <td>
                    <a href="{{route('listDetail',['id'=>$Product->id])}}"> <button class="btn bg-gradient-primary  mb-2 ms-2" data-class="bg-white" >Chi tiết</button></a>
                   </td>
                   <td>
                     <h6 class="mb-0 text-sm">{{ $Product->brand->name}}</h6>
                   </td>
                   <td>
                     <h6 class="mb-0 text-sm">{{ $Product->category->name}}</h6>
                   </td>
                   <td>
                    <a href="{{route('addDetail',['id'=>$Product->id])}}"> <button class="btn bg-gradient-primary  mb-2 ms-2" data-class="bg-white" >thêm thuộc tính </button></a>
                   </td>
                   
                  <td class="align-middle text-center text-sm">
                    <a href="{{route('editProduct',['id'=>$Product->id])}}"> <button class="btn bg-gradient-primary  mb-2 ms-2" data-class="bg-white" >Sửa</button></a>
                    <a href="{{route('deleteProduct',['id'=>$Product->id])}}"> <button class="btn bg-gradient-primary  mb-2 ms-2" data-class="bg-white" >Xóa</button></a>
                  </td>
                </tr>
              </tbody>
                 
               @endforeach
               
             </table>
           </div>
         </div>
       </div>
       <a href="{{route('addProduct')}}"><button type="button" class="btn btn-primary"> Thêm Sản Phẩm</button></a>
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
