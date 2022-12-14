@php
$jops = App\Models\Jop::all();

$new = App\Models\clerk::has('detail')->has('files')->has('families')
->where('status','new')
->where('verified',1)
->get();

$pending = App\Models\clerk::has('detail')->has('files')->has('families')->where('verified',1)->where('status','pending')->get();

$rejected = App\Models\clerk::has('detail')->has('files')->has('families')->where('verified',1)->where('status','rejected')->get();

$accepted = App\Models\clerk::has('detail')->has('files')->has('families')->where('verified',1)->where('status','accepted')->get();
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="/2.png" alt="AdminLTE Logo" width="80px" height="80px" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            {{-- <img src="/1.png" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          <a href="#" class="d-block">لوحة التحكم  </a>
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
                <span class="badge badge-info right">{{ $jops->count() }}</span>
              </p>
            </a>
            <ul class="nav nav-treeview">

              </li>
              <li class="nav-item">
                <a href="{{ route('admin.jop.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> جميع الاقسام</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.jop.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>اضافة قسم</p>
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
                <span class="badge badge-info right">{{ $new->count() }}</span>
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
