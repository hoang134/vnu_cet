<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="img/logo/logo.png" rel="icon">
  <title>@yield('title')</title>
  <link href="{{asset('css/libs/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="{{asset('js/libs/jquery/jquery.nicescroll.min.js')}}">
  <link href="{{asset('css/libs/ruang-admin.min.css')}}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.23/datatables.min.css"/>


    {{--    PDF--}}
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
  @yield('style')

</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
        <div class="sidebar-brand-icon">
          <img src="{{asset('images/logo.png')}}">
        </div>
        <div class="sidebar-brand-text mx-3">Trang chủ</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.home') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Trang chủ</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Chức năng
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm1" aria-expanded="true"
          aria-controls="collapseForm1">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Chỉnh sửa thông tin</span>
        </a>
        <div id="collapseForm1" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="py-2 collapse-inner rounded">
            <h4 class="collapse-header">Chỉnh sửa thông tin</h4>
            <a class="collapse-item" href="{{ route('admin.edit.logo') }}">Logo</a>
            <a class="collapse-item" href="{{ route('admin.edit.infomation') }}">Thông tin trung tâm</a>
            <a class="collapse-item" href="{{ route('admin.edit.infomation.cocau') }}">Cơ cấu,tổ chức</a>
            <a class="collapse-item" href="{{ route('admin.edit.infomation.chucnang') }}">Chức năng,nhiệm vụ</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvent" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Quản lý sự kiện</span>
        </a>
        <div id="collapseEvent" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="py-2 collapse-inner rounded">
            <h4 class="collapse-header">Quản lý sự kiện</h4>
            <a class="collapse-item" href="{{ route('admin.add.notification') }}">Thêm sự kiện</a>
            <a class="collapse-item" href="{{ route('admin.all.notification') }}">Tất cả sự kiện</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Quản lý câu hỏi</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="py-2 collapse-inner rounded">
            <h4 class="collapse-header">Quản lý câu hỏi</h4>
            <a class="collapse-item" href="{{route('admin.question.create')}}">Thêm câu hỏi chung</a>
            <a class="collapse-item" href="{{ route('admin.question.index') }}">Quản lý câu hỏi</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Quản lý tin nhắn</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="py-2 collapse-inner rounded">
            <h4 class="collapse-header">Quản lý tin nhắn</h4>
            <a class="collapse-item" href="{{ route('admin.messengers.index') }}">Quản lý tin nhắn</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Dịch vụ</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="py-2 collapse-inner rounded">
            <h4 class="collapse-header">Dịch vụ</h4>
            <a class="collapse-item" href="{{ route('admin.service.create') }}">Thêm dịch vụ</a>
            <a class="collapse-item" href="{{ route('admin.service.index') }}">Quản lý dịch vụ</a>
            <a class="collapse-item" href="{{ route('admin.service.list.register') }}">Danh sách đăng ký dịch vụ</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column" style="background-color: #f2f2f2;">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="{{ asset('images/1.png') }}" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->Hoten}}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Thông tin tài khoản
                </a>
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
 -->                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Đổi mật khẩu<u></u>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('admin.logout')}}" onclick="return confirm('Bạn chắc chắn muốn đăng xuất?')">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Đăng xuất
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
         <div style="margin:10px;padding: 10px;">
            @yield('content')
          </div>
        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer" style="background-color: #343a40;">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span style="color: white;">copyright @2021</span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="{{asset('js/libs/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('js/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/libs/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('js/libs/ruang-admin.min.js')}}"></script>
  <!-- <script src="{{asset('js/libs/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('js/libs/demo/chart-area-demo.js')}}"></script>  -->
  <script src="{{asset('css/ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('css/ckeditor/ckfinder/ckfinder.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.23/datatables.min.js"></script>


  <script type="text/javascript">
        @if(session('success'))
        toastr.success('{{ session('success') }}');
        @endif
        @if(session('error'))
        toastr.error('{{ session('error') }}');
        @endif

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

@yield('script')
</body>

</html>
