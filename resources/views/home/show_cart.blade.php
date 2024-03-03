<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Zees Sweet Bloom | cart</title>
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
    <style>
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            padding: 30px;
        }
        
    </style>

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
   @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
                <button class="button" class="close" data-dismiss="alert" aria-hidden="true">   x </button>

                </div>
            @endif
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
                <div class="center">
                    <?php $total_price = 0; ?>
    <table class="border-collapse border border-gray-400">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Product Title</th>
                <th class="p-2">Price</th>
                <th class="p-2">Product Quantity</th>
                <th class="p-2">Image</th>
                <th class="p-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carts as $cart)
            <tr class="border-b border-gray-400">
                <td class="p-2">{{ $cart->product_title }}</td>
                <td class="p-2">$ {{ $cart->price * $cart->quantity }}</td>
                <td class="p-2">{{ $cart->quantity }}</td>
                <td class="p-2"><img class="img_deg" src="{{ asset('product_images/'.$cart->image) }}" alt="" style="width:100px; height:100px;"></td>
                <td class="p-2"><a href="{{ url('delete_cart/'.$cart->id) }}" class="btn btn-danger">Remove</a></td>
            </tr>
            <?php $total_price = $total_price + ($cart->price * $cart->quantity); ?>
            @endforeach
        </tbody>
    </table>
    <div class="text-center" style ="padding: 30px;">
        <h2>Total Price: $ {{ $total_price }}</h2>
</div>
<div>
    <h2>Proceed to Order :</h2>
    <a href="{{url('cash_order')}}" class="btn btn-danger">Cash On Delivery</a>
    <a href="{{url('mpesa')}}" class="btn btn-danger">Online Payment</a>
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