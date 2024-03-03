<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <base href="/public">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Zee's Sweet Bloom | Product Details</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="home/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="home/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="home/assets/css/slicknav.css">
    <link rel="stylesheet" href="home/assets/css/flaticon.css">
    <link rel="stylesheet" href="home/assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="home/assets/css/gijgo.css">
    <link rel="stylesheet" href="home/assets/css/animate.min.css">
    <link rel="stylesheet" href="home/assets/css/animated-headline.css">
    <link rel="stylesheet" href="home/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="home/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="home/assets/css/themify-icons.css">
    <link rel="stylesheet" href="home/assets/css/slick.css">
    <link rel="stylesheet" href="home/assets/css/nice-select.css">
    <link rel="stylesheet" href="home/assets/css/style.css">

</head>
<body class="full-wrapper">
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <!-- <img src="home/assets/img/logo/loder.png" alt=""> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start-->
   @include('home.header')
    <!-- header end -->
    <main>
        <!--? Hero Area Start-->
        <div class="container-fluid">
            <div class="slider-area">
                <!-- Mobile Device Show Menu-->
                <div class="header-right2 d-flex align-items-center">
                    <!-- Social -->
                    <div class="header-social  d-block d-md-none">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    </div>
                    <!-- Search Box -->
                    <div class="search d-block d-md-none" >
                        <ul class="d-flex align-items-center">
                            <li class="mr-15">
                                <div class="nav-search search-switch">
                                    <i class="ti-search"></i>
                                </div>
                            </li>
                            <li>
                                <div class="card-stor">
                                    <img src="home/assets/img/gallery/card.svg" alt="">
                                    <span>0</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /End mobile  Menu-->
<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 relative" style="margin:auto; width:50%; padding:20px">
    <!-- <div class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
        <div class="absolute inset-0 bg-gray-800 opacity-75"></div>
        <div class="flex flex-col items-center justify-center text-white z-10">
            <a href="" class="flex items-center justify-center bg-red-500 text-white rounded-full px-4 py-2 mb-2">
                <span class="mr-2"><i class="fas fa-shopping-cart"></i></span>
                <span class="text-sm">Add to Cart</span>
            </a>
            <a href="{{url('product_details',$product->id)}}" class="flex items-center justify-center bg-blue-500 text-white rounded-full px-4 py-2">
                <span class="mr-2"><i class="fas fa-info-circle"></i></span>
                <span class="text-sm">Product Details</span>
            </a>
        </div>
    </div> -->
    <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
        <div class="popular-img relative">
            <img src="product_images/{{$product->image}}" alt="{{$product->title}}">
            <div class="favorit-items absolute top-0 right-0 mt-2 mr-2">
                <!-- <img src="home/assets/img/gallery/favorit-card.png" alt=""> -->
            </div>
        </div>
        <div class="popular-caption">
            <h3>{{$product->title}}</h3>
            <div class="rating mb-10">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            @if($product->discount_price!=null)
            <span style="text-decoration:line-through; color:red;">${{$product->price}}</span><br>
            <span style="color:blue">Discount price: ${{$product->discount_price}}</span>
            @else
            <span style="color:blue">Price: ${{$product->price}}</span><br>
            @endif
           <h6> <br>Product Description: {{$product->description}}<br></h6>
           <h6>Product Category: {{$product->category}}<br></h6>
           <h6> Available Quantity: {{$product->quantity}}<br></h6>
           
           <form action="{{url('add_cart',$product->id)}}">
                @csrf
                <div class="flex items-center justify-center mb-2">
                    <input type="number" name="quantity" value="1" min="0" class="border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:border-blue-500" style="color:black; width: 50px;">
                </div>
                <input type="submit" value="Add to Cart" class="bg-red-500 text-white rounded-full px-4 py-2 cursor-pointer hover:bg-red-600">
            </form>        </div>
    </div>
</div>
<!--? Services Area End -->
</main>
@include('home.footer')
<!--? Search model Begin -->
<div class="search-model-box">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-btn">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Searching key.....">
        </form>
    </div>
</div>
<!-- Search model end -->
<!-- Scroll Up -->
<div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->
<!-- Jquery, Popper, Bootstrap -->
<script src="home/assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="home/assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="home/assets/js/popper.min.js"></script>
<script src="home/assets/js/bootstrap.min.js"></script>

<!-- Slick-slider , Owl-Carousel ,slick-nav -->
<script src="home/assets/js/slick.min.js"></script>
<script src="home/assets/js/owl.carousel.min.js"></script>
<script src="home/assets/js/jquery.slicknav.min.js"></script>

<!-- One Page, Animated-HeadLin, Date Picker -->
<script src="home/assets/js/animated.headline.js"></script>
<script src="home/assets/js/wow.min.js"></script>
<script src="home/assets/js/jquery.magnific-popup.js"></script>
<script src="home/assets/js/gijgo.min.js"></script>

<!-- Nice-select, sticky,Progress -->
<script src="home/assets/js/jquery.nice-select.min.js"></script>
<script src="home/assets/js/jquery.sticky.js"></script>
<script src="home/assets/js/jquery.barfiller.js"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="home/assets/js/jquery.counterup.min.js"></script>
<script src="home/assets/js/waypoints.min.js"></script>
<script src="home/assets/js/jquery.countdown.min.js"></script>
<script src="home/assets/js/hover-direction-snake.min.js"></script>

<!-- contact js -->
<script src="home/assets/js/contact.js"></script>
<script src="home/assets/js/jquery.form.js"></script>
<script src="home/assets/js/jquery.validate.min.js"></script>
<script src="home/assets/js/mail-script.js"></script>
<script src="home/assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->	
<script src="home/assets/js/plugins.js"></script>
<script src="home/assets/js/main.js"></script>

</body>
</html>