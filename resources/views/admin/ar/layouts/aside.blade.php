<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="/dashboard/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">وزارة الدفاع</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/dashboard/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('dashboard') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>

             الرئيسية
              </p>
            </a>

          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                     الوظائف
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">

              </li>
              <li class="nav-item">
                <a href="{{ route('admin.jop.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> جميع الوظائف</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.jop.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>اضافة الوظائف</p>
                </a>
              </li>


            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                     الطلبات
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">

              </li>


              <li class="nav-item">
                <a href="{{ route('admin.clerk.index.new') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>طلبات جديدة</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.clerk.index.pending') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> طلبات تحت المراجعة</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.clerk.index.accepted') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> طلبات مقبولة</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.clerk.index.rejected') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> طلبات مرفوضة</p>
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
