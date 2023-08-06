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
             <form action="{{ route('addDetail',['id'=>$Product->id]) }}" method="POST"  enctype="multipart/form-data" >
               @csrf
               <input type="hidden" class="form-control" name="product_id" value="{{$Product->id }}">
               <div class="mb-3 ms-3 px-3">
                  <label  class="form-label">Màu sản phẩm</label>
                  <input type="color" class="form-control" name="color">
                </div>
                
                
                <div class="mb-3 ms-3 px-3">
                  <label  class="form-label">Size</label>
                  <select class="form-control" name="size">
                     <option value="0">chọn size</option>
                     <option value="M">M</option>
                     <option value="L">L</option>
                     <option value="XL">XL</option>
                     <option value="XXL">XXL</option>
                 </select>
                </div>
               
                <div class="mb-3 ms-3 px-3">
                  <label  class="form-label">Số lượng</label>
                  <input type="text" class="form-control" name="quantity">
                </div>
                
                </div>
                <div class="mb-3 ms-3 px-3">
                <button type="submit" class="btn btn-primary"> Thêm </button>
               <a href="{{ route('listProduct') }}"> <button type="button" class="btn btn-primary"> Danh Sách </button></a>
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
@section('scripts')
<script>
   $(function(){
       function readURL(input, selector) {
           if (input.files && input.files[0]) {
               let reader = new FileReader();

               reader.onload = function (e) {
                   $(selector).attr('src', e.target.result);
               };

               reader.readAsDataURL(input.files[0]);
           }
       }
       $("#cmt_truoc").change(function () {
           readURL(this, '#mat_truoc_preview');
       });

   });
</script>
@endsection
