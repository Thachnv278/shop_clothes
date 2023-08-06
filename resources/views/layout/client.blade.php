<!DOCTYPE html>
<html lang="en">

<head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <title>Home</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!--===============================================================================================-->
   <link rel="icon" type="image/png" href="{{asset('images/icons/favicon.png')}}" />
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}} ">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{asset('fonts/iconic/css/material-design-iconic-font.min.css')}}">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{asset('fonts/linearicons-v1.0.0/icon-font.min.css')}}">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
   <!--==============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{asset('vendor/slick/slick.css')}}">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{asset('vendor/MagnificPopup/magnific-popup.css')}}">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
   <!--===============================================================================================-->
</head>

<body class="animsition">

   <!-- Header -->
   <header>
      <!-- Header desktop -->
      <div class="container-menu-desktop">
         <!-- Topbar -->
         <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
               <div class="left-top-bar">
                  Free shipping for standard order over $100
               </div>

               <div class="right-top-bar flex-w h-full">
                  <a href="#" class="flex-c-m trans-04 p-lr-25">
                     Help & FAQs
                  </a>

                  <a href="#" class="flex-c-m trans-04 p-lr-25">
                     My Account
                  </a>

                  <a href="#" class="flex-c-m trans-04 p-lr-25">
                     EN
                  </a>

                  <a href="#" class="flex-c-m trans-04 p-lr-25">
                     USD
                  </a>
               </div>
            </div>
         </div>

         <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container ">

               <!-- Logo desktop -->
               <a href="#" class="logo">
                  <img src="{{asset('images/icons/logo-01.png ')}}">
               </a>

               <!-- Menu desktop -->
               <div class="menu-desktop">
                  <ul class="main-menu">
                     <li class="active-menu">
                        <a href="{{route('home')}}">Home</a>

                     </li>

                     <li>
                        <a href="{{route('Product')}}">Shop</a>
                     </li>

                     <li >
                        <a href="{{route('showbill')}}">Shoping Cart</a>
                     </li>

                     <li>
                        <a href="{{asset('blog')}}">Blog</a>
                     </li>

                     <li>
                        <a href="{{asset('about')}}">About</a>
                     </li>

                     <li>
                        <a href="{{asset('contact')}}">Contact</a>
                     </li>
                  </ul>
               </div>

               <!-- Icon header -->
               <div class="wrap-icon-header flex-w flex-r-m">
                  <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                     <i class="zmdi zmdi-search"></i>
                  </div>

                  <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti " data-notify="2">
                     <a href="{{route('showcart')}}"><i class="zmdi zmdi-shopping-cart"></i></a>
                  </div>
                 
                     <div class="dropdown">
                      <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 " >
                       <i class="fa fa-user me-sm-1"></i>
                      </div>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @if (Auth::check())
                        <p>Xin chào, {{ Auth::user()->name }}</p>
                        <a class="dropdown-item" href="{{route('signout')}}">Đăng xuất </a>
                        @if (Auth::user()->role == 1)
                        <a href="{{route('listUser')}}" class="dropdown-item" >Đăng nhập Admin</a>
                        @endif
                        @else
                        <a href="{{route('signin')}}" class="dropdown-item" >Đăng nhập</a>
                       <a href="{{route('addUser')}}" class="dropdown-item" >Đăng ký</a>
                           
                        @endif          
                     </div>
                   </div>           
                  <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
                     <i class="zmdi zmdi-favorite-outline"></i>
                  </a>
               </div>
            </nav>
         </div>
      </div>
   </header>

   <!-- Cart -->
   <div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			{{-- <div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-01.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								White Shirt Pleat
							</a>

							<span class="header-cart-item-info">
								1 x $19.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-02.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Converse All Star
							</a>

							<span class="header-cart-item-info">
								1 x $39.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-03.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Nixon Porter Leather
							</a>

							<span class="header-cart-item-info">
								1 x $17.00
							</span>
						</div>
					</li>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div> --}}
		</div>
	</div>
   <div class="content">
     
   @yield('content')
   </div>

   <!-- Footer -->
   <footer class="bg3 p-t-75 p-b-32">
      <div class="container">
         <div class="row">
            <div class="col-sm-6 col-lg-3 p-b-50">
               <h4 class="stext-301 cl0 p-b-30">
                  Categories
               </h4>

               <ul>
                  <li class="p-b-10">
                     <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                        Women
                     </a>
                  </li>

                  <li class="p-b-10">
                     <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                        Men
                     </a>
                  </li>

                  <li class="p-b-10">
                     <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                        Shoes
                     </a>
                  </li>

                  <li class="p-b-10">
                     <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                        Watches
                     </a>
                  </li>
               </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
               <h4 class="stext-301 cl0 p-b-30">
                  Help
               </h4>

               <ul>
                  <li class="p-b-10">
                     <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                        Track Order
                     </a>
                  </li>

                  <li class="p-b-10">
                     <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                        Returns
                     </a>
                  </li>

                  <li class="p-b-10">
                     <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                        Shipping
                     </a>
                  </li>

                  <li class="p-b-10">
                     <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                        FAQs
                     </a>
                  </li>
               </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
               <h4 class="stext-301 cl0 p-b-30">
                  GET IN TOUCH
               </h4>

               <p class="stext-107 cl7 size-201">
                  Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
               </p>

               <div class="p-t-27">
                  <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                     <i class="fa fa-facebook"></i>
                  </a>

                  <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                     <i class="fa fa-instagram"></i>
                  </a>

                  <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                     <i class="fa fa-pinterest-p"></i>
                  </a>
               </div>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
               <h4 class="stext-301 cl0 p-b-30">
                  Newsletter
               </h4>

               <form>
                  <div class="wrap-input1 w-full p-b-4">
                     <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
                     <div class="focus-input1 trans-04"></div>
                  </div>

                  <div class="p-t-18">
                     <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                        Subscribe
                     </button>
                  </div>
               </form>
            </div>
         </div>

         <div class="p-t-40">
            <div class="flex-c-m flex-w p-b-18">
               <a href="#" class="m-all-1">
                  <img src="{{asset('images/icons/icon-pay-01.png')}}" alt="ICON-PAY">
               </a>

               <a href="#" class="m-all-1">
                  <img src="{{asset('images/icons/icon-pay-02.png')}}" alt="ICON-PAY">
               </a>

               <a href="#" class="m-all-1">
                  <img src="{{asset('images/icons/icon-pay-03.png')}}" alt="ICON-PAY">
               </a>

               <a href="#" class="m-all-1">
                  <img src="{{asset('images/icons/icon-pay-04.png')}}" alt="ICON-PAY">
               </a>

               <a href="#" class="m-all-1">
                  <img src="{{asset('images/icons/icon-pay-05.png')}}" alt="ICON-PAY">
               </a>
            </div>

            <p class="stext-107 cl6 txt-center">
               <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
               Copyright &copy;<script>
                  document.write(new Date().getFullYear());
               </script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
               <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

            </p>
         </div>
      </div>
   </footer>


   <!-- Back to top -->
   <div class="btn-back-to-top" id="myBtn">
      <span class="symbol-btn-back-to-top">
         <i class="zmdi zmdi-chevron-up"></i>
      </span>
   </div>

   <!-- Modal1 -->

   

   <!--===============================================================================================-->
   <script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
   <!--===============================================================================================-->
   <script src="{{asset('vendor/animsition/js/animsition.min.js')}}"></script>
   <!--===============================================================================================-->
   <script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
   <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
   <!--===============================================================================================-->
   <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
   <script>
      $(".js-select2").each(function() {
         $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
         });
      })
   </script>
   <!--===============================================================================================-->
   <script src="{{asset('vendor/daterangepicker/moment.min.js')}}"></script>
   <script src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
   <!--===============================================================================================-->
   <script src="{{asset('vendor/slick/slick.min.js')}}"></script>
   <script src="{{asset('js/slick-custom.js')}}"></script>
   <!--===============================================================================================-->
   <script src="{{asset('vendor/parallax100/parallax100.js')}}"></script>
   <script>
      $('.parallax100').parallax100();
   </script>
   <!--===============================================================================================-->
   <script src="{{asset('vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
   <script>
      $('.gallery-lb').each(function() { // the containers for all your galleries
         $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
               enabled: true
            },
            mainClass: 'mfp-fade'
         });
      });
   </script>
   <!--===============================================================================================-->
   <script src="{{asset('vendor/isotope/isotope.pkgd.min.js')}}"></script>
   <!--===============================================================================================-->
   <script src="{{asset('vendor/sweetalert/sweetalert.min.js')}}"></script>
   <script>
      $('.js-addwish-b2').on('click', function(e) {
         e.preventDefault();
      });

      $('.js-addwish-b2').each(function() {
         var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
         $(this).on('click', function() {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-b2');
            $(this).off('click');
         });
      });

      $('.js-addwish-detail').each(function() {
         var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

         $(this).on('click', function() {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-detail');
            $(this).off('click');
         });
      });

      /*---------------------------------------------*/

      $('.js-addcart-detail').each(function() {
         var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
         $(this).on('click', function() {
            swal(nameProduct, "is added to cart !", "success");
         });
      });
   </script>
   <!--===============================================================================================-->
   <script src="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
   <script>
      $('.js-pscroll').each(function() {
         $(this).css('position', 'relative');
         $(this).css('overflow', 'hidden');
         var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
         });

         $(window).on('resize', function() {
            ps.update();
         })
      });
   </script>
   <!--===============================================================================================-->
   <script src="{{asset('js/main.js')}}"></script>

</body>

</html>