<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="/customer-home-component">
                <img src="{{asset('admin/assets/images/logo-top-2.png')}}" alt="homepage" />
                <img src="{{asset('admin/assets/images/logo-text-1.png')}}" alt="homepage" />
            </a>
          </div>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="/admin-home-component">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Dashboard</span>
              </a>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Admin Details</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#categories" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-codesandbox fe-16"></i>
                <span class="ml-3 item-text">Category</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="categories">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{route('admin.categories')}}"><span class="ml-1 item-text">Dress Category</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{route('admin.ourservices')}}"><span class="ml-1 item-text">Service Category</span></a>
                </li>
              </ul>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{route('admin.products')}}">
                <i class="fe fe-shopping-bag fe-16"></i>
                <span class="ml-3 item-text">Dresses</span>
              </a>
            </li>
            
            <li class="nav-item w-100">
              <a class="nav-link" href="{{route('admin.sale')}}">
                <i class="fe fe-zap fe-16"></i>
                <span class="ml-3 item-text">Sale Setting</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{route('admin.coupons')}}">
                <i class="fe fe-award fe-16"></i>
                <span class="ml-3 item-text">Coupons</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{route('admin.ourworks')}}">
                <i class="fe fe-briefcase fe-16"></i>
                <span class="ml-3 item-text">Works</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a href="#home-manage" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-align-justify fe-16"></i>
                <span class="ml-3 item-text">Home Manage</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="home-manage">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{route('admin.homesliders')}}"><span class="ml-1 item-text">Home Slider</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{route('admin.homecategories')}}"><span class="ml-1 item-text">Home Category</span></a>
                </li>
              </ul>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Customer Details</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="{{route('admin.orders')}}">
                <i class="fe fe-truck fe-16"></i>
                <span class="ml-3 item-text">Orders</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="#">
                <i class="fe fe-pen-tool fe-16"></i>
                <span class="ml-3 item-text">Reviews</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="#">
                <i class="fe fe-users fe-16"></i>
                <span class="ml-3 item-text">Customers</span>
              </a>
            </li>
          </ul>
          <div class="btn-box w-100 mt-4 mb-1">
            <a href="{{url('logout')}}" target="_blank" class="btn mb-2 btn-primary btn-lg btn-block">
              <i class="fe fe-shopping-cart fe-12 mx-2"></i><span class="small">log out</span>
            </a>
          </div>
        </nav>
</aside>