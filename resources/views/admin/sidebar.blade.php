<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{asset('adminassets/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
          <h1 class="h5">Mark Stephen</h1>
          <p>Web Designer</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
      <ul class="list-unstyled">
              <li class="active"><a href="{{url('admin/dashboard')}}"> <i class="icon-home"></i>Home </a></li>
              <li><a href="{{ url('view_category') }}"> <i class="icon-grid"></i>Category </a></li>
              {{--  <li><a href="charts.html"> <i class="fa fa-bar-chart"></i>Charts </a></li>
              <li><a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li>  --}}
              <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Products</a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="{{url('add_product')}}">Add Product</a></li>
                  <li><a href="{{url('view_product')}}">View Product</a></li>
                </ul>
              </li>
              <li><a href="{{ url('view_order') }}"> <i class="icon-grid"></i>Orders</a></li>
              {{--  <li><a href="login.html"> <i class="icon-logout"></i>Login page </a></li>  --}}
      {{--  </ul><span class="heading">Extras</span>  --}}
      {{--  <ul class="list-unstyled">
        <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
        <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
        <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
      </ul>  --}}
    </nav>