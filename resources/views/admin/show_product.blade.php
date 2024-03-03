<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        .center{
            margin: auto;
            width: 80%;
            border: 3px solid #73AD21;
            margin-top: 50px;
            text-align: center;
        }
        .font_size{
            font-size: 40px;
            text-align: center;
            font-weight: 600;
            padding-bottom: 40px;}
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
            <h2 class = "font_size">All Products</h2>
            <table class="center">
                <tr style="background-color:skyblue;">
                    <th style="padding:30px;">Product Title</th>
                    <th style="padding:30px;">Product Description</th>
                    <th style="padding:30px;">Product Price</th>
                    <th style="padding:30px;">Discount Price</th>
                    <th style="padding:30px;">Product Quantity</th>
                    <th style="padding:30px;">Product Category</th>
                    <th style="padding:30px;">Product Image</th>
                    <th style="padding:30px;">Edit</th>
                    <th style="padding:30px;">Delete</th>

                </tr>
                @foreach($data as $item)
                <tr>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->discount_price}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->category}}</td>
                    <td><img src="{{asset('product_images/'.$item->image)}}" alt="image" style="width: 150px; height: 150px;"></td>
                    <td><a class="btn btn-success" href="{{url('edit_product/'.$item->id)}}">Edit</a></td>

                    <td><a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Product?')" href="{{url('delete_product/'.$item->id)}}">Delete</a></td>
                </tr>
                @endforeach

            </table>
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