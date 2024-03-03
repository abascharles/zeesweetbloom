<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        .div_center {
            text-align: center;
            margin-top: 40px;
        }
        .h2font {
            font-size: 40px;
            font-weight: 600;
            padding-bottom: 40px;
        }
        .input_color{
            color: black;
        }
        .center{
            margin:auto;
            width: 50%;
            text-align: center;
            margin-top: 40px;
            border: 3px solid green;
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
                <h2 class="h2font">Add Category</h2>
                <form action="{{url('/add_category')}}" method="POST">
                    @csrf
                    <input type="text" class = "input_color" name="category_name" placeholder="Add a Category">
                    <input type="submit" class = "btn btn-primary" name = "submit" value="Add a Category">
                </form>
            </div>
            <table class="center">
                <tr>
                    <td>Category Name</td>
                    <td>Action</td>
                </tr>
                @foreach($data as $data)
                <tr>
                    <td>{{$data->category_name}}</td>
                    <td><a onclick="return confirm('Are you sure you want to delete this Category?')"class="btn btn-danger" href="{{ url('delete_category', $data->id) }}">Delete</a></td>
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