@extends('layout.admin')
@section('content')
<div class="content p-5">
<div class="container-fluid py-4">

   <div class="row">
     <div class="col-12">
       <div class="card mb-4">
         <div class="card-header pb-0">
           <h6>Cập trạng thái</h6>
         </div>
         <div class="card-body px-0 pt-0 pb-2">
           <div class="table-responsive p-0">
             <form action="{{route('editBill',$Bill->id)}}" method="POST" >
               @csrf
               <div class="mb-3 ms-3 px-3">
                  <label  class="form-label">Trạng thái</label>
                  <select class="form-control" name="status">
                     <option value="{{$Bill->status}}">@if ($Bill->status == 0)
                        đang chuẩn bị hàng
                     @elseif ($Bill->status == 1)
                        đang giao hàng
                     @elseif ($Bill->status == 2)
                        giao hàng thành công
                        
                     @endif
                  </option>
                    
                         <option value="1">Đang giao</option>
                         <option value="2">giao hàng thành công</option>
                     
                 </select>
                </div>
                <button type="submit" class="btn btn-primary"> Sửa </button>
               <a href="{{ route('listBill') }}"> <button type="button" class="btn btn-primary"> Danh Sách </button></a>
                 </div>
              </form>
           </div>
         </div>
       </div>
       
      
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
