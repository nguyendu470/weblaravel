<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img style="height: 40px; width: 40px;" src="{{$user->avatar}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{$user->name}}</a>
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
      <nav class="mt-2" id="myDIV">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link" style="background-color: #5C5696">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Danh Mục
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('addemploye')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Nhân Viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('listemploye')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Nhân Viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('addcustomer')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Khách Hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('listcustomer')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Khách Hàng</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <div class="sidebar-custom" style="padding-top: 10px">
      <a href="{{route('logout')}}" class="btn btn-secondary" style="width: 100%">Đăng Xuất<i class="fas fa-sign-out-alt" style="margin-left: 10px"></i></a>
    </div>
    <!-- /.sidebar-custom -->
  </aside>