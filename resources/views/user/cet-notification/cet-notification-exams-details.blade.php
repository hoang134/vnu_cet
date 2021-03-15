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

<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{route('trangchu')}}"><i class="fa fa-home"></i> Trang chủ</a>
                    <a href="{{route('cet.notification.exam')}}"> Đợt thi</a>
                    <span>Chi tiết đợt thi</span>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="custombox clearfix">
                    @foreach($exam_detail as $detail)
                    <h4 class="small-title">{{$detail->TenKythi}}</h4>
                    @endforeach
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="comments-list">
                                <div class="media">
                                    <div class="media-body">
                                        <h4><strong>1.Thông tin chung</strong></h4>
                                        <div class="ml-4">
                                        @foreach($exam_detail as $detail)
                                        <p>
                                            <strong>Mã đợt thi</strong>:{{$detail->MaKythi}}
                                        </p>
                                        <p><strong>Hạn đăng ký</strong>:{{$detail->Handangky}}</p>
                                        <p><strong>Ngày thi từ</strong>:{{$detail->Tungay}} - {{$detail->Toingay}}</p>
                                        @endforeach
                                        
                                        <p><strong>Thời gian ca thi</strong>:<br>
                                            @foreach($exam_detail_cathi as $detail)
                                            <div style="display: inline;">
                                                Ca {{$detail->Cathi}}:{{$detail->Giothi}} ngày {{$detail->Ngaythi}}<br>
                                                </div>
                                            @endforeach
                                        </p>

                                        <p><strong>Địa điểm</strong>:
                                            @foreach($exam_detail_diadiem as $detail)
                                                {{$detail->Madiadiem}}
                                            @endforeach
                                        </p>

                                        <p><strong>Mô tả đợt thi</strong>:<br>
                                            @foreach($exam_detail as $detail)
                                                {{$detail->Mota}}
                                            @endforeach
                                        </p>
                                        </div>
                                        <br>
                                        <h4><strong>2.Thông tin chi tiết</strong></h4>
                                        <p>
                                            <table class="table">
                                                <tr>
                                                    <th>Mã bài thi</th>
                                                    <th>Giờ thi</th>
                                                    <th>Ngày thi</th>
                                                    <th>Địa điểm thi</th>
                                                    <th>Lệ phí thi</th>
                                                    <th>Thời gian làm bài</th>
                                                </tr>
                                                @foreach($exam_detail_monthi as $detail)
                                                    <tr>
                                                        <td>{{$detail->MaMonthi}}</td>
                                                        <td>{{$detail->Giothi}}</td>
                                                        <td>{{$detail->Ngaythi}}</td>
                                                        <td>{{$detail->Diaidiemthi}}</td>
                                                        <td>{{$detail->Lephithi}}</td>
                                                        <td>{{$detail->Thoigianlambai}}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </p>                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="blog-sidebar">
                    <div class="recent-post">
                        <h4>Đợt thi mới</h4>
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection