@extends('layout.client')
@section('content')
<div class="content p-5">
<div class="bg0 m-t-23 p-b-140">
   <div class="container">
      <div class="flex-w flex-sb-m p-b-52">
         <div class="flex-w flex-l-m filter-tope-group m-tb-10">
            <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
               Tất cả sản phẩm
            </button>
            @foreach ( $Category as $Category )
            <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{ $Category->name }}">
               {{ $Category->name }}
            </button>
            @endforeach

            

          
         </div>

         <div class="flex-w flex-c-m m-tb-10">
            <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
               <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
               <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
               Search
            </div>
         </div>

         <!-- Search product -->
         <div class="dis-none panel-search w-full p-t-10 p-b-15">
            <div class="bor8 dis-flex p-l-15">
               <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                  <i class="zmdi zmdi-search"></i>
               </button>

               <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
            </div>
         </div>

         <!-- Filter -->
        
      </div>

      <div class="row isotope-grid">
         @foreach ( $Product as $Product)
         <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $Product->category->name }}">
            <!-- Block2 -->
            <div class="block2">
               <div class="block2-pic hov-img0">
                  <img src="{{ $Product->image?''.Storage::url($Product->image):''}}" >
                  <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                     Quick View
                  </a>
               </div>

               <div class="block2-txt flex-w flex-t p-t-14">
                  <div class="block2-txt-child1 flex-col-l ">
                     <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                        {{$Product->name}}
                     </a>

                     <span class="stext-105 cl3">
                        {{$Product->price}} VNĐ
                     </span>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>

      <!-- Load more -->
      <div class="flex-c-m flex-w w-full p-t-45">
         <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
            Load More
         </a>
      </div>
   </div>
</div>
</div>
@endsection