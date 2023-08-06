@extends('layout.admin')
@section('content')
<div class="content p-5">
<div class="container-fluid py-4">

   <div class="row">
     <div class="col-12">
       <div class="card mb-4">
         <div class="card-header pb-0">
           <h6>User</h6>
         </div>
         <div class="card-body px-0 pt-0 pb-2">
           <div class="table-responsive p-0">
             <form action="{{route('editUser',['id'=>$User->id])}}" method="POST" >
               @csrf
               <div class="mb-3 ms-3 px-3">
                  <label  class="form-label">Tên </label>
                  <input type="text" class="form-control" value="{{$User->name}}" name="name">
                </div>
                <div class="mb-3 ms-3 px-3">
                  <label  class="form-label">Email</label>
                  <input type="email" class="form-control" value="{{$User->email}}" name="email">
                </div>
                <div class="mb-3 ms-3 px-3">
                  <label  class="form-label">Mật Khẩu</label>
                  <input type="password" class="form-control" value="{{$User->email}}" name="password">
                </div>
                <div class="mb-3 ms-3 px-3">
                  <label  class="form-label">Role</label>
                  <input type="text" class="form-control" value="{{$User->role}}" name="role">
                </div>
                <div class="mb-3 ms-3 px-3">
                <button type="submit" class="btn btn-primary"> Sửa</button>
               <a href="{{ route('listUser') }}"> <button type="button" class="btn btn-primary"> Danh Sách </button></a>
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
