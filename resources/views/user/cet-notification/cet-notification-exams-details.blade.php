@extends('dashboard')
@section('content')


<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
    <div class="page-wrapper">
        <div class="blog-title-area text-center">                    
            <h3>Kỳ thi @foreach($exam_detail as $detail)
                    {{$detail->TenKythi}}
                @endforeach
            </h3>
        </div>

        <hr class="invis">            

        <div class="blog-content">  
            <div class="pp" style="overflow: auto;">
                
                @foreach($exam_detail as $detail)
                    <p>
                        Số ca thi:{{$detail->Socathi}}
                    </p>
                    <p>Hạn đăng ký:{{$detail->Handangky}}</p>
                    <p>Thời gian thi:từ ngày {{$detail->Tungay}} tới ngày {{$detail->Toingay}}</p>
                @endforeach
                
                <p>Thời gian ca thi:<br>
                    @foreach($exam_detail_cathi as $detail)
                        Ca {{$detail->Cathi}}({{$detail->Giothi}}) ngày {{$detail->Ngaythi}}<br>
                    @endforeach
                </p>

                <p>Địa điểm:
                    @foreach($exam_detail_diadiem as $detail)
                        {{$detail->Madiadiem}}
                    @endforeach
                </p>

                <p>Mô tả:
                    @foreach($exam_detail as $detail)
                        {{$detail->Mota}}
                    @endforeach
                </p>

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
@endsection
@section('content_extend')
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">

        <div class="widget">
            <h2 class="widget-title" style="text-transform: uppercase;font-size: 30px;">Các kỳ thi khác</h2>
            <br>
            <div class="blog-list-widget">
                <div class="list-group">
                    @foreach($infomation_kythi as $infomation_kythi_value)
                    <a href="{{ route('cet.notification.exam.detail', $infomation_kythi_value->MaKythi) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <img src="{{asset('images/latest-1.jpg')}}" alt="" class="img-fluid float-left" style="margin-bottom: 5px;">
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