@extends('dashboard')
@section('content')

<style type="text/css">
    .custombox {
    position: relative;
    padding: 20px 20px;
    border: 1px dashed #dadada;
}
.small-title {
    background: #edeff2 none repeat scroll 0 0;
    font-size: 16px;
    left: 5%;
    line-height: 1;
    margin: 0;
    padding: 0.6rem 1.5rem;
    position: absolute;
    text-align: center;
    top: -18px;
}
</style>

<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
    <div class="page-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('cet.home') }}"><i class="fa fa-home"></i> Trang chủ</a></li>
              <li class="breadcrumb-item" aria-current="page">Thông tin chi tiết sự kiện</li>
            </ol>
        </div>  
        <hr class="invis">
        <br>
        @foreach($event_detail as $detail)
        <div class="custombox clearfix">
            <h4 class="small-title">{{$detail->title}}</h4>
            <div class="row">
                <div class="col-lg-12">
                    <div class="comments-list">
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="upload/author.jpg" alt="" class="rounded-circle">
                            </a>
                            <div class="media-body">
                                <div class="pp" style="overflow: auto;">
                                    <p>
                                        <?php echo "$detail->content"; ?>
                                    </p>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach  
    </div>
</div>
@endsection
@section('content_extend')
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">

        <div class="widget">
            <h2 class="widget-title" style="text-transform: uppercase;">Sự kiện khác</h2>
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