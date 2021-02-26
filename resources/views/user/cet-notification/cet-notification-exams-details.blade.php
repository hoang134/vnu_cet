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
              <li class="breadcrumb-item" aria-current="page">Chi tiết kỳ thi</li>
            </ol>
        </div>
        <hr class="invis">  
        <br>        
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
                                    <strong>Mã kỳ thi</strong>:{{$detail->MaKythi}}
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

                                <p><strong>Mô tả kỳ thi</strong>:<br>
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
                                            <th>Mã môn thi</th>
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
</div>
@endsection
@section('content_extend')
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">

        <div class="widget">
            <h2 class="widget-title" style="text-transform: uppercase;">Các kỳ thi khác</h2>
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