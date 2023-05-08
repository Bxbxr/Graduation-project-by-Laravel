    <!-- Sidebar -->
    <ul class="pr-0 navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
          <img class="pl-4" style="width:140%" height="70" src="{!! asset('logo.png') !!}"> 
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('admin.index') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>الإحصائيات</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">


      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ request()->is('admin/channels') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('channels.index') }}">
        <i class="fas fa-user-lock"></i>
          <span>الصلاحيات</span>
        </a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ request()->is('admin/channels') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('allVideos') }}">
        <i class="fas fa-film"></i>
          <span>الفيديوهات</span>
        </a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{-- request()->is('admin/channels') ? 'active' : '' --}}">
        <a class="nav-link text-right" href="{{ route('allPosts') }}">
        <i class="far fa-newspaper"></i>
          <span>المنشورات</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{-- request()->is('admin/allChannels*') ? 'active' : '' --}}">
        <a class="nav-link text-right" href="{{ route('page.create') }}">
        <i class="fas fa-file"></i>
          <span>الصفحات</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item ">
        <a class="nav-link text-right" href="{{ route('allpages') }}">
        <i class="fas fa-book"></i>
          <span>ادارة الصفحات</span>
        </a>
      </li>
      

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ request()->is('admin/channels/blocked*') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('channels.blocked') }}">
        <i class="fas fa-lock"></i>
          <span>الجامعات المحظورة</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ request()->is('admin/allChannels*') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('channels.all') }}">
        <i class="fas fa-chalkboard-teacher"></i>
          <span>الجامعات</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{-- request()->is('admin/allChannels*') ? 'active' : '' --}}">
        <a class="nav-link text-right" href="{{ route('users.all') }}">
        <i class="fas fa-"></i>
          <span>جميع الطلاب</span>
        </a>
      </li>
{{-- 
      <li class="nav-item request()->is('admin/allChannels*') ? 'active' : ''">
        <a class="nav-link text-right" href="#">
        <i class="fas fa-user-graduate"></i>
          <span>طلاب الجامعات</span>
        </a>
      </li> --}}



      <!-- Nav Item - Charts -->
      <li class="nav-item {{ request()->is('admin/MostViewedVideos*') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('most.viewed.video') }}">
        <i class="fas fa-fire"></i>
          <span> الفيديوهات الأكثر مشاهدة</span></a>
      </li>

      <!-- Nav Item - Charts -->
      {{-- <li class="nav-item request()->is('admin/MostViewedVideos*') ? 'active' : ''">
        <a class="nav-link text-right" href="#">
        <i class="fas fa-chart-line"></i>
          <span> المنشورات الأكثر مشاهدة</span></a>
      </li> --}}

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->