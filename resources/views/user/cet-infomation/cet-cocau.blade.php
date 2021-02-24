@extends('dashboard')
@section('banner')
<section class="hero-section">
    <div class="hero-items owl-carousel">
        <div class="single-hero-items set-bg" data-setbg="{{asset('images/hero-1.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <h1>Welcome to CET</h1>
                        <p>Chào mừng bạn đến với trang khảo thí Đại học Quốc gia Hà Nội</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-hero-items set-bg" data-setbg="{{asset('images/hero-2.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <h1>Welcome to CET</h1>
                        <p>Chào mừng bạn đến với trang khảo thí Đại học Quốc gia Hà Nội</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
    <div class="page-wrapper">
        <div class="blog-title-area text-center">
            <h1 style="text-transform: uppercase;"><strong>Thông tin trung tâm</strong></h1>
        </div>
        <br>
        <div class="blog-content">  
            <div class="">
                @foreach($infomation_cocau as $infomation_cocau_value)
                    <?php 
                        echo "$infomation_cocau_value->content2";
                    ?>
                @endforeach
            </div>
        </div>
    </div>     
</div>    
@endsection
@section('content_extend')
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">
        <div class="widget">
            <h2 class="widget-title" style="text-transform: uppercase;">Sự kiện mới</h2>
            <br>
            <div class="trend-videos">
                @foreach($infomation_sukien as $infomation_sukien_value)
                <div class="blog-box">
                    <div class="post-media">
                        <a href="{{route('cet.notification.event.detail',$infomation_sukien_value->id)}}" title="">
                            <img src="{{asset($infomation_sukien_value->imagetitle)}}" alt="" class="img-fluid">
                            <div class="hovereffect">
                                <span class="videohover"></span>
                            </div>
                        </a>
                    </div>
                    <div class="blog-meta">
                        <h5><a href="{{route('cet.notification.event.detail',$infomation_sukien_value->id)}}" title="">{{$infomation_sukien_value->title}}</a></h5>
                    </div>
                </div>

                <hr class="invis">
                @endforeach
            </div>
        </div>

        <br>

        <div class="widget">
            <h2 class="widget-title" style="text-transform: uppercase;">Các kỳ thi mới</h2>
            <br>
            <div class="blog-list-widget">
                <div class="list-group">
                    @foreach($infomation_kythi as $infomation_kythi_value)
                    <a href="{{ route('cet.notification.exam.detail', $infomation_kythi_value->MaKythi) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <img src="{{asset('Khaothi/Anhkythi/'.$infomation_kythi_value->Anhkythi)}}" alt="" class="img-fluid float-left" style="margin-bottom: 5px;">
                            <h5 class="mb-1">{{$infomation_kythi_value->TenKythi}}</h5>
                            <small>Hạn đăng ký:{{$infomation_kythi_value->Handangky}}</small>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>

        <br>

        <div class="widget">
            <h2 class="widget-title" style="text-transform: uppercase;">Các trang liên quan</h2>
            <br>
            <div class="blog-list-widget">
                <div class="list-group">
                    <a href="http://tracuu.dgnl.edu.vn/" class="l">
                        <div class="w-100 justify-content-between">
                            <img src="{{asset('images/cetdky/CET_KTHP chung.png')}}" alt="" class="img-fluid float-left">
                        </div>
                    </a>
                    <a class="l">
                        <div class="w-100 justify-content-between">
                            <img src="{{asset('images/cetdky/CET_tracuuthongtin_0.png')}}" alt="" class="img-fluid float-left">
                        </div>
                    </a>
                    <a class="l">
                        <div class="w-100 justify-content-between">
                            <img src="{{asset('images/cetdky/CET_DKDT_1.png')}}" alt="" class="img-fluid float-left">
                        </div>
                    </a>
                    <a class="l">
                        <div class="w-100 justify-content-between">
                            <img src="{{asset('images/cetdky/CET_tracuudangkyduthi_0.png')}}" alt="" class="img-fluid float-left">
                        </div>
                    </a>
                    <a href="http://diemthi.dgnl.edu.vn/" class="l">
                        <div class="w-100 justify-content-between">
                            <img src="{{asset('images/cetdky/CET_TracuuDiemthi_0.png')}}" alt="" class="img-fluid float-left">
                        </div>
                    </a>
                    <a class="l">
                        <div class="w-100 justify-content-between">
                            <img src="{{asset('images/cetdky/khaosatykiensinhvien.png')}}" alt="" class="img-fluid float-left">
                        </div>
                    </a>
                </div>
            </div>
            <br>
            <div class="row text-center">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="http://facebook.com" class="social-button facebook-button">
                        <i class="fa fa-facebook"></i>
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#" class="social-button twitter-button">
                        <i class="fa fa-twitter"></i>
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#" class="social-button google-button">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#" class="social-button youtube-button">
                        <i class="fa fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection