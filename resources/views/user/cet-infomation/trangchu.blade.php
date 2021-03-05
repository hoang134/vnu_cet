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

    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{route('trangchu')}}"><i class="fa fa-home"></i> Trang chủ</a>    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 pt-1 pl-5 pr-5 pb-1">
                    <div class="section-title">
                        <h2>Sự kiện mới</h2>
                    </div>
                    <div class="product-slider owl-carousel">
                        @foreach($infomation_sukien as $infomation_sukien_value)
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="{{asset('images/latest-1.jpg')}}" alt="">
                                <div class="sale">New</div>
                                <div class="icon">
                                    <i class="fa fa-info-circle"></i>
                                </div>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Sự kiện</div>
                                <a href="#">
                                    <h5>{{$infomation_sukien_value->title}}</h5>
                                </a>
                                <div class="rb-text">
                                    <p><span>{{$infomation_sukien_value->timestart}} - {{$infomation_sukien_value->timeend}}</span></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Các kỳ thi mới</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($infomation_kythi as $infomation_kythi_value)
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="{{asset('Khaothi/Anhkythi/'.$infomation_kythi_value->Anhkythi)}}" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    Hạn đăng ký:{{$infomation_kythi_value->Handangky}}
                                </div>
                            </div>
                            <a href="{{ route('cet.notification.exam.detail', $infomation_kythi_value->MaKythi) }}">
                                <h4>{{$infomation_kythi_value->TenKythi}}</h4>
                            </a>
                            <p>{{$infomation_kythi_value->Mota}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="instagram-photo">
        <div class="insta-item set-bg" data-setbg="{{asset('images/home/1.jpg')}}">
            <div class="inside-text">
                <i class="fa fa-camera"></i>
                <h5><a href="#">CET-VNU</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{asset('images/home/2.jpg')}}">
            <div class="inside-text">
                <i class="fa fa-camera"></i>
                <h5><a href="#">CET-VNU</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{asset('images/home/3.jpg')}}">
            <div class="inside-text">
                <i class="fa fa-camera"></i>
                <h5><a href="#">CET-VNU</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{asset('images/home/4.jpg')}}">
            <div class="inside-text">
                <i class="fa fa-camera"></i>
                <h5><a href="#">CET-VNU</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{asset('images/home/5.jpg')}}">
            <div class="inside-text">
                <i class="fa fa-camera"></i>
                <h5><a href="#">CET-VNU</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{asset('images/home/6.jpg')}}">
            <div class="inside-text">
                <i class="fa fa-camera"></i>
                <h5><a href="#">CET-VNU</a></h5>
            </div>
        </div>
    </div>

@endsection