@extends('dashboard')
@section('content')
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{route('trangchu')}}"><i class="fa fa-home"></i> Trang chủ</a>
                    <span>Kỳ thi</span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="blog-list clearfix w-100">
                        @foreach($exams as $exam)
                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="{{ route('cet.notification.exam.detail', $exam->MaKythi) }}" title="">
                                        <img src="{{asset('Khaothi/Anhkythi/'.$exam->Anhkythi)}}" alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->

                            <div class="blog-meta big-meta col-md-8">
                                <h4 style="margin-bottom: 5px;"><a href="{{route('cet.notification.exam.detail', $exam->MaKythi)}}" title="">{{$exam->TenKythi}} - {{$exam->MaKythi}}</a></h4>
                                <p><?php echo "$exam->Mota"; ?></p>
                                <small class="firstsmall"><a class="bg-orange">Thông báo</a></small>
                                <small><a>Hạn đăng ký:{{$exam->Handangky}}</a></small>
                            </div>
                        </div>

                        <hr class="invis">
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    {!! $exams->links('vendor.pagination.bootstrap-4') !!}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="blog-sidebar">
                    <div class="recent-post">
                        <h4>Sự kiện mới</h4>
                        <div class="recent-blog">
                            @foreach($infomation_sukien as $infomation_sukien_value)
                            <a href="{{route('cet.notification.event.detail',$infomation_sukien_value->id)}}" class="rb-item">
                                <div class="rb-pic">
                                    <img src="{{asset($infomation_sukien_value->imagetitle)}}" alt="">
                                </div>
                                <div class="rb-text">
                                    <h6>{{$infomation_sukien_value->title}}</h6>
                                    <p>New <span>- May 19, 2019</span></p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="recent-post">
                        <h4>Kỳ thi mới</h4>
                        <div class="recent-blog">
                            @foreach($infomation_kythi as $infomation_kythi_value)
                            <a href="{{ route('cet.notification.exam.detail', $infomation_kythi_value->MaKythi) }}" class="rb-item">
                                <div class="rb-pic">
                                    <img src="{{asset('Khaothi/Anhkythi/'.$infomation_kythi_value->Anhkythi)}}" alt="">
                                </div>
                                <div class="rb-text">
                                    <h6>{{$infomation_kythi_value->TenKythi}}</h6>
                                    <p>Hạn đăng ký<span>- {{$infomation_kythi_value->Handangky}}</span></p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="recent-post">
                        <h4>Trang liên kết</h4>
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
                    <br>
                    <div class="blog-tags">
                        <h4>Các từ khóa</h4>
                        <div class="tag-item">
                            <a href="#">Kỳ thi</a>
                            <a href="#">Sự kiện</a>
                            <a href="#">Môn thi</a>
                            <a href="#">Dresses</a>
                            <a href="#">Trousers</a>
                            <a href="#">Men's hats</a>
                            <a href="#">Backpack</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection