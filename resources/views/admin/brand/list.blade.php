@extends('layout.admin')
@section('content')
<div class="content p-5">
<div class="container-fluid py-4">

   <div class="row">
     <div class="col-12">
       <div class="card mb-4">
         <div class="card-header pb-0">
           <h6>Thương hiệu </h6>
         </div>
         <div class="card-body px-0 pt-0 pb-2">
           <div class="table-responsive p-0">
             <table class="table align-items-center mb-0">
               <thead>
                 <tr>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã thương hiệu</th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên thương hiệu</th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Logo</th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mô tả</th>
                   <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thao Tác</th>
                 </tr>
               </thead>
               @foreach ($Brand as $Brand)
               <tbody>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                        <h6 class="mb-0 text-sm">{{ $Brand->id }}</h6>
                    </div>
                  </td>
                  <td>
                    <h6 class="mb-0 text-sm">{{ $Brand->name}}</h6>
                  </td>
                  <td>
                    <img src="{{ $Brand->logo?''.Storage::url($Brand->logo):''}}" style="width: 70px" />
                  </td>
                  <td>
                    <h6 class="mb-0 text-sm">{{ $Brand->description}}</h6>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <a href="{{route('editBrand',['id'=>$Brand->id])}}"> <button class="btn bg-gradient-primary  mb-2 ms-2" data-class="bg-white" >Sửa</button></a>
                    <a href="{{route('deleteBrand',['id'=>$Brand->id])}}"> <button class="btn bg-gradient-primary  mb-2 ms-2" data-class="bg-white" >Xóa</button></a>
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
