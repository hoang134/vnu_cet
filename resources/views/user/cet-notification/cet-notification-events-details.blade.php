@extends('dashboard')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
    <div class="page-wrapper">
        @foreach($event_detail as $detail)
        <div class="blog-title-area text-center">                    
            <h3>Sự kiện {{$detail->title}}</h3>
        </div>

        <hr class="invis">            

        <div class="blog-content">  
            <div class="pp" style="overflow: auto;">
                <p>
                    <?php echo "$detail->content"; ?>
                </p>  
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
            <h2 class="widget-title" style="text-transform: uppercase;font-size: 30px;">Sự kiện khác</h2>
            <br>
            <div class="trend-videos">
                @foreach($infomation_sukien as $infomation_sukien_value)
                <div class="blog-box">
                    <div class="post-media">
                        <a href="{{route('cet.notification.event.detail',$infomation_sukien_value->id)}}" title="">
                            <img src="{{asset('images/latest-1.jpg')}}" alt="" class="img-fluid">
                            <div class="hovereffect">
                                <span class="videohover"></span>
                            </div>
                        </a>
                    </div>
                    <div class="blog-meta">
                        <h4><a href="{{route('cet.notification.event.detail',$infomation_sukien_value->id)}}" title="">{{$infomation_sukien_value->title}}</a></h4>
                    </div>
                </div>

                <hr class="invis">
                @endforeach
            </div>
        </div>

        <br>

        <div class="widget">
            <h2 class="widget-title" style="text-transform: uppercase;font-size: 30px;">Các trang liên quan</h2>
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