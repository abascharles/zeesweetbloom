<header>
        <!-- Header Start -->
        <div class="header-area ">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper d-flex align-items-center justify-content-between">
                        <div class="header-left d-flex align-items-center">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="{{url('/')}}"><img src="img/LOGO1.jpeg" alt="logo" style="width:70px; height:70px;"></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{url('/')}}">Home</a></li> 
                                        <li><a href="{{url('/shop')}}">shop</a></li>
                                        <li><a href="{{url('about')}}">About</a></li>
                                        <!-- <li><a href="{{url('/blog')}}">Blog</a> -->
                                            <!-- <ul class="submenu">
                                                <li><a href="home/blog.html">Blog</a></li>
                                                <li><a href="home/blog_details.html">Blog Details</a></li>
                                                <li><a href="home/elements.html">Elements</a></li>
                                                <li><a href="home/product_details.html">Product Details</a></li>
                                            </ul>
                                        </li> -->
                                        <li><a href="{{url('/contact')}}">Contact</a></li>
                                        @if (Route::has('login'))
                                        @auth
                                        <li class="nav-item"><x-app-layout> </x-app-layout></li>
                                        @else
                                        <button class="btn btn-primary rounded-pill h-12 w-24 bg-blue-500 text-black text-center" style="background-color:blue;"><a href="{{route('login')}}" id="logincss" style="color:white; text-decoration:none;">Login</a></button>
                                        <button class="btn btn-success rounded-pill h-12 w-24 bg-green-500 text-black text-center" style="background-color:green;"><a href="{{route('register')}}" style="color:white; text-decoration:none;">Register</a></button>
                                        @endauth
                                        @endif

                                    </ul>
                                </nav>
                            </div>   
                        </div>
                        <div class="header-right1 d-flex align-items-center">
                            <!-- Social -->
                            <div class="header-social d-none d-md-block">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                            <!-- Search Box -->
                            <div class="search d-none d-md-block">
                                <ul class="d-flex align-items-center">
                                    <li class="mr-15">
                                        <div class="nav-search search-switch">
                                            <i class="ti-search"></i>
                                        </div>
                                    </li>
                                    <li>
                                    <a href="{{ url('show_cart') }}"> 
                                        <div class="card-stor">
                                        <img src="{{ asset('home/assets/img/gallery/card.svg') }}" alt="">
                                        @auth
                                                @php
                                                $userId = auth()->id();
                                                    $userCartItems = \App\Models\cart::where('user_id', $userId)->get();
                                                    $cartItemCount = $userCartItems->count();
                                                @endphp
                                            <span>{{ $cartItemCount }}</span>
                                        @endauth
                                        </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>