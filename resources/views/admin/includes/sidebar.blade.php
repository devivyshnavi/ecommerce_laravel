<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Vyshnavii</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/categories" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Category
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/products" class="nav-link"><i class="nav-icon fas fa-copy"></i>
            <p>Products</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/users" class="nav-link"><i class="nav-icon fas fa-user"></i>
            <p>User</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/banners" class="nav-link"><i class="nav-icon fas fa-image"></i>
            <p>Banner</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/coupons" class="nav-link"><i class="nav-icon fas fa-gift"></i>
            <p>Coupon</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/orders" class="nav-link"><i class="nav-icon fas fa-shopping-bag"></i>
            <p>Order details</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/contacts" class="nav-link"><i class="nav-icon fas fa-address-book"></i>
            <p>Contacts</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/cms" class="nav-link"><i class="nav-icon fas fa-address-book"></i>
            <p>CMS management</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/configuration" class="nav-link"><i class="nav-icon fas fa-envelope"></i>
            <p>Configuration</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-folder" aria-hidden="true"></i>
            <p>
              Reports<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/salesreport" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sales Report</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/usersreport" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Users Report</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/couponsreport" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Coupons Report</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>