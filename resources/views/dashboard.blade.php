<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trang khảo thí</title>

    <link href="{{asset('css/libs3/toastr.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/libs3/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/libs3/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/libs3/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/libs3/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/libs3/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/libs3/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/libs3/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/libs3/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/libs3/style.css')}}" type="text/css">
{{--    PDF--}}
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    @yield('style')
</head>
<body>
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        trungtamkhaothi@vnu.edu.vn
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        (+84) – 24.66759258  /  (+84) – 24.62532740
                    </div>
                </div>
                <div class="ht-right">
                    @if(Auth::check())
                    <nav class="navbar navbar-expand navbar-light bg-navbar topbar static-top">
                      <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow" style="background-color: #fff;">
                          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="ml-2 d-lg-inline" style="color: #007f49;">{{\Illuminate\Support\Facades\Auth::user()->Hoten}}</span>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{route('change.infomation')}}">
                              <i class="fa fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                              Thông tin tài khoản
                            </a>
                              <a class="dropdown-item" href="{{route('student.list.exam')}}">
                                  <i class="fa fa-university fa-sm fa-fw mr-2 text-gray-400"></i>
                                  Kỳ thi đã đăng ký
                              </a>
                              <a class="dropdown-item" href="{{route('student.xacnhandiemthi')}}">
                                  <i class="fa fa-pencil-square fa-sm fa-fw mr-2 text-gray-400"></i>
                                  Xác nhận điểm thi
                              </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('logout')}}" onclick="return confirm('Bạn chắc chắn muốn đăng xuất?')">
                              <i class="fa fa-sign-out fa-sm fa-fw mr-2 text-gray-400"></i>
                              Đăng xuất
                            </a>
                          </div>
                        </li>
                      </ul>
                    </nav>
                    @else
                    <a href="{{route('login')}}" class="login-panel"><i class="fa fa-user"></i>Đăng nhập  </a>
                    <a href="{{route('register')}}" class="login-panel" style="margin-right:10px;"><i class="fa fa-user"></i>Đăng ký </a>
                    @endif
                </div>
            </div>
        </div>
        @if(Auth::check())
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <a href="{{route('cet.home')}}">
                            @foreach(\Illuminate\Support\Facades\DB::table('cet_logo')->get() as $logo)
                            <img src="{{asset($logo->imagelogo)}}" alt="" width="100%" height="100%" style="max-height:109px;max-width:259px;">
                            @endforeach
                        </a>
                    </div>
                    <div class="col-lg-7 col-md-7 mt-3">
                        <div class="advanced-search">
                            <div class="input-group">
                                <input type="text" placeholder="Từ khóa cần tìm" style="border:1px solid #f2f2f2;border-radius: 10px;">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="cart-icon">
                                <a href="#">
                                    <i class="icon_bag_alt"></i> Lịch sử
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @else
       <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        @foreach(\Illuminate\Support\Facades\DB::table('cet_logo')->get() as $logo)
                            <img src="{{asset($logo->imagelogo)}}" alt="" width="100%" height="100%" style="max-height:109px;max-width:259px;">
                            @endforeach
                    </div>
                    <div class="col-lg-8 col-md-8 mt-3">
                        <div class="advanced-search">
                            <div class="input-group">
                                <input type="text" placeholder="Từ khóa cần tìm" style="border:1px solid #f2f2f2;border-radius: 10px;">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="nav-item">
            <div class="container">
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class=""><a href="{{route('trangchu')}}"><i class="fa fa-home"></i></a>
                        <li class=""><a> Giới thiệu</a>
                            <ul class="dropdown">
                                <li><a href="{{route('cet.home')}}"> Thông tin trung tâm</a>
                                <li><a href="{{route('cet.cocau')}}">Cơ cấu,tổ chức</a></li>
                                <li><a href="{{route('cet.chucnang')}}">Chức năng,nhiệm vụ</a></li>
                            </ul>
                        </li>
                        <li><a> Tin tức</a>
                            <ul class="dropdown">
                                <li><a href="{{route('cet.notification.event')}}">Các sự kiện</a></li>
                                <li><a href="{{route('cet.notification.exam')}}">Các kỳ thi</a></li>
                            </ul>
                        </li>
                        @if(Auth::check())
                        <li><a> Đăng ký thi</a>
                            <ul class="dropdown">
                                <li><a target="_blank">Thi thử</a></li>
                                @if(Checkuser::checkProfile())
                                @if(Checkuser::checkExam())
                                    <li><a href="/Khaothi/cet_Dangkythi.php" target="_blank">Đăng ký thi</a></li>
                                    <li><a href="/Khaothi/cet_SuaDangkythi.php" target="_blank">
                                    Sửa đăng ký thi</a></li>
                                @else
                                    <li><a href="/Khaothi/cet_Dangkythi.php" target="_blank">Đăng ký thi</a></li>
                                @endif
                                @endif
                            </ul>
                        </li>
                        @if(Checkuser::checkProfile())
                            <li><a href="/Khaothi/cet_CapnhatHS.php" target="_blank"> Cập nhật hồ sơ</a></li>
                        @else
                            <li><a href="/Khaothi/cet_DangkyHS.php" target="_blank">Nhập hồ sơ thi</a></li>
                        @endif

                        <li><a> Diễn đàn trao đổi</a>
                             <ul class="dropdown">
                                <li><a href="{{route('home.question')}}">Trao đổi chung</a></li>
                                <li><a href="{{route('student.my.question')}}">Trao đổi riêng</a></li>
                            </ul>
                        </li>
                        <li><a> Dịch vụ</a>
                          <ul class="dropdown">
                              <li><a>Thu phí</a>
                              <li><a href="{{route('student.service')}}">Dịch vụ khác</a>
                          </ul>
                        </li>
                        <li><a> Hỗ trợ</a>
                          <ul class="dropdown">
                              <li><a>Thu phí</a>
                              <li><a href="{{route('student.service')}}">Dịch vụ khác</a>
                          </ul>
                        </li>
                        @endif
                        @if(!Auth::check())
                        <li><a href="{{route('home.question')}}"> Diễn đàn trao đổi chung</a></li>
                        @endif
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    @yield('banner')
    @yield('content')
    @yield('content_extend')

    <div class="partner-logo">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Các đối tác</h2>
                    </div>
                </div>
            </div>
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{asset('/images/doitac/uet_logo.png')}}" alt="" />
                    </div>
                </div>

                <div class="logo-item">
                    <div class="tablecell-inner">
                         <img src="{{asset('/images/doitac/DHKHTN_logo.png')}}" alt="" />
                    </div>
                </div>

                <div class="logo-item">
                    <div class="tablecell-inner">
                         <img src="{{asset('/images/doitac/ussh_logo.png')}}" alt="" />
                    </div>
                </div>

                <div class="logo-item">
                    <div class="tablecell-inner">
                         <img src="{{asset('/images/doitac/ulis.png')}}" alt="" />
                    </div>
                </div>

                <div class="logo-item">
                    <div class="tablecell-inner">
                         <img src="{{asset('/images/doitac/dhkt.jpg')}}" alt="" />
                    </div>
                </div>

                <div class="logo-item">
                    <div class="tablecell-inner">
                         <img src="{{asset('/images/doitac/khoa_luat.jpg')}}" alt="" />
                    </div>
                </div>

                <div class="logo-item">
                    <div class="tablecell-inner">
                         <img src="{{asset('/images/doitac/dhtnmt.png')}}" alt="" />
                    </div>
                </div>

                <div class="logo-item">
                    <div class="tablecell-inner">
                         <img src="{{asset('/images/doitac/dhvinh.jpg')}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-section" id="footerid">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-widget">
                        <h5>Thông tin liên hệ</h5>
                    </div>
                    <div class="footer-left">
                        <ul>
                            <li><i class="fa fa-map-marker"></i> Địa chỉ:Tầng 8, Tòa nhà C1T, 144 Xuân Thủy, Cầu Giấy, Hà Nội.</li><br>
                            <li><i class="fa fa-phone"></i> Số điện thoại:(+84)-24.66759.258 / (+84)-24.62532.740</li><br>
                            <li><i class="fa fa-envelope"></i> Email:trungtamkhaothi@vnu.edu.vn</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h5>Chính sách</h5>
                        <ul>
                            <li><a href="#">Chính sách 1</a></li>
                            <li><a href="#">Chính sách 2</a></li>
                            <li><a href="#">Chính sách 3</a></li>
                            <li><a href="#">Chính sách 4</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h5>Hỗ trợ</h5>
                        <ul>
                            <li><a href="#">Hỗ trợ 1</a></li>
                            <li><a href="#">Hỗ trợ 2</a></li>
                            <li><a href="#">Hỗ trợ 3</a></li>
                            <li><a href="#">Hỗ trợ 4</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Cần hỗ trợ</h5>
                        <p>Hãy để lại địa chỉ email của bạn</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Nhập email của bạn.">
                            <button type="button">Gửi</button>
                        </form>
                    </div>
                    <section class="blog-section mt-lg-2">
                        <div class="col-lg-12">
                            <div class="blog-sidebar">
                                <div class="blog-tags">
                                    <div class="tag-item">
                                        <a>Kỳ thi</a>
                                        <a href="#">Môn thi</a>
                                        <a href="#">Sự kiện</a>
                                        <a href="#">Đánh giá</a>
                                        <a href="#">Trousers</a>
                                        <a href="#">Men's hats</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            Copyright @2020
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </footer>
@if(Auth::check())
<div class="chat-screen-messenger">
    <div class="chat-header">
        <div class="chat-header-title">
            Nhắn tin với trung tâm
        </div>
    </div>
    <iframe src="{{route('student.messengers')}}" width="100%;" height="300px;"></iframe>
</div>
</div>
    <div class="chat-bot-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square animate"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x "><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
    </div>
@endif

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('js/libs3/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/libs3/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/libs3/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('js/libs3/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('js/libs3/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('js/libs3/jquery.dd.min.js')}}"></script>
    <script src="{{asset('js/libs3/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/libs3/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/libs3/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script type="text/javascript">
        @if(session('success'))
        toastr.success('{{ session('success') }}');
        @endif
        @if(session('error'))
        toastr.error('{{ session('error') }}');
        @endif
    </script>
    <script>
    $(document).ready(function () {
        $(".chat-bot-icon").click(function (e) {
            $(this).children('img').toggleClass('hide');
            $(this).children('svg').toggleClass('animate');
            $('.chat-screen-messenger').toggleClass('show-chat');
            $('.chat-body-messenger').removeClass('hide');
            $('.chat-input').removeClass('hide');
            $('.chat-header-option').removeClass('hide');
        });
        $('.end-chat').click(function () {
            $('.chat-body-messenger').addClass('hide');
            $('.chat-input').addClass('hide');
            $('.chat-header-option').addClass('hide');
        });
    });
</script>
    @yield('script')
</body>
</html>
