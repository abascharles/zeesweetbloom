<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        .div_center{
            text-align: center;
            margin-top: 40px;
        }
        .font_size{
            font-size: 40px;
            font-weight: 600;
            padding-bottom: 40px;}
            .text_color{
                color: black;
            }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
                <button class="button" class="close" data-dismiss="alert" aria-hidden="true">   x </button>

                </div>
            @endif
            <div class="div_center">
                <h1 class="font_size">Add a Product</h1>
                <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div>
                <label for="product title">Product Title : </label><br>
                <input type="text" class="text_color" name="title" placeholder="Write a title" required>
                </div>
                <div>
                <label for="product description">Product Description : </label><br>
                <input type="text" class="text_color" name="description" placeholder="Write a Description" required>
                </div>
                <div>
                <label for="product price">Product Price : </label><br>
                <input type="number" class="text_color" min = "0" name="price" placeholder="Write a Price" required>
                </div>
                <div>
                <label for="discount price">Discount Price : </label><br>
                <input type="number" class="text_color" min = "0" name="discount_price" placeholder="">
                </div>
                <div>
                <label for="product quantity">Product Quantity : </label><br>
                <input type="number" class="text_color" min = "0" name="quantity" placeholder="" required>
                </div>
                
                <div class="text-color">
                <label>Product Category</label><br>
                    <select name="category" class="text-color" style="color:black;" required>
                        <option value="" selected="" class="text-color">Add a Category</option>
                        @foreach($category as $category)
                        <option value="{{$category->category_name}}" class="text-color">{{$category->category_name}}</option>
                        @endforeach
                    </select>                
                </div>
                <div>
                <label for="product image">Product Image : </label><br>
                <input type="file" name="image" placeholder="" required>
                </div>
                <div>
                <input type="submit" value="Add a Product" class="btn btn-primary">
                </div>
                </form>
            </div>
            </div>
            </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>