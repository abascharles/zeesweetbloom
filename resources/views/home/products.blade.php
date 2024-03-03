<div class="new-arrival">
    <div class="container">
        <!-- Section title -->
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="section-tittle mb-60 text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                    <h2>Our<br>Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 relative">
                <div class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute inset-0 bg-gray-800 opacity-75"></div>
                    <div class="flex flex-col items-center justify-center text-white z-10">
                        @if(Auth::check())
                        <form action="{{url('add_cart',$product->id)}}">
                            @csrf
                            <div class="flex items-center justify-center mb-2">
                                <input type="number" name="quantity" value="1" min="0" class="border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:border-blue-500" style="color:black; width: 50px;">
                            </div>
                            <input type="submit" value="Add to Cart" class="bg-red-500 text-white rounded-full px-4 py-2 cursor-pointer hover:bg-red-600">
                        </form>
                        @endif
                        <a href="{{url('product_details',$product->id)}}" class="flex items-center justify-center bg-blue-500 text-white rounded-full px-4 py-2 mt-2">
                            <span class="mr-2"><i class="fas fa-info-circle"></i></span>
                            <span class="text-sm">Product Details</span>
                        </a>
                    </div>
                </div>
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
                        <span style="text-decoration:line-through; color:red;">${{$product->price}}</span>
                        <span style="color:blue">Discount price: ${{$product->discount_price}}</span>
                        @else
                        <span style="color:blue">Price: ${{$product->price}}</span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {!!$products->appends(Request::all())->links()!!}
    </div>
</div>
