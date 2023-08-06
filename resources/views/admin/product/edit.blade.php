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
            <form action="{{route('editProduct',['id'=>$Product->id])}}" method="POST"  enctype="multipart/form-data" >
               @csrf
               <div class="mb-3 ms-3 px-3">
                  <label  class="form-label">Tên Sản Phẩm</label>
                  <input type="text" class="form-control" value="{{ $Product->name }}" name="name">
                </div>
                <div class="mb-3 ms-3 px-3">
                  <label  class="form-label">Giá</label>
                  <input type="text" class="form-control" value="{{ $Product->price }}" name="name">
                </div>
                
                <div class="form-group mb-3 ms-3 px-3">
                  <label class="col-md-3 col-sm-4 control-label">Ảnh</label>
                  <div class="col-md-9 col-sm-8">
                      <div class="row">
                          <div class="col-xs-6">
                              <img id="mat_truoc_preview" src="{{ $Product->image?''.Storage::url($Product->image):''}}" style="width: 70px" }}" alt="your image"
                                   style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                              <input type="file" name="image" accept="image/*"
                                     class="form-control-file @error('image') is-invalid @enderror" id="cmt_truoc">
                            
                          </div>
                      </div>
                  </div>
                </div>
                <div class="mb-3 ms-3 px-3">
                  <label  class="form-label">Mô Tả</label>
                  <input type="text" class="form-control" value="{{ $Product->description }}" name="description">
                </div>
                <div class="mb-3 ms-3 px-3">
                  <label  class="form-label">Thương hiệu</label>
                  <select class="form-control" name="brand_id">
                     <option value="{{$Product->brand_id}}">{{ $Product->brand->name }}</option>
                     @foreach ($Brand as $Brand)
                         <option value="{{ $Brand->id }}">{{ $Brand->name }}</option>
                     @endforeach
                 </select>
                </div>
                <div class="mb-3 ms-3 px-3">
                  <label  class="form-label">Thể loại</label>
                  <select class="form-control"  name="category_id">
                     <option value="{{$Product->category_id}}">{{ $Product->Category->name }}</option>
                     @foreach ($Category as $Category)
                         <option value="{{ $Category->id }}">{{ $Category->name }}</option>
                     @endforeach
                 </select>
                </div>
                <div class="mb-3 ms-3 px-3">
                <button type="submit" class="btn btn-primary"> Sửa </button>
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
