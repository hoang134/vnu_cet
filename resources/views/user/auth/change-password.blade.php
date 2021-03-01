@extends('dashboard')
@section('content')
<style type="text/css">
    .custombox {
    position: relative;
    padding: 3rem 2rem;
    border: 1px solid #dadada;
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
.form-wrapper h4 {
    margin-bottom: 1.5rem;
}

.form-wrapper .form-control {
    background: #fff none repeat scroll 0 0;
    border: 1px dashed #dadada;
    border-radius: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1;
    letter-spacing: 0.3px;
    margin-bottom: 1.4rem;
    min-height: 50px;
    text-transform: none;
}

.form-wrapper .btn i {
    padding-left: 0.5rem;
}

.form-wrapper textarea {
    min-height: 120px !important;
    padding-top: 1rem
}
</style>
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{route('trangchu')}}"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Thay đổi thông tin</span>
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
                        <div class="page-wrapper w-100">
        <br>
        <div class="custombox clearfix">
            <h4 class="small-title">Đổi mật khẩu</h4>
            <div class="row">
                <div class="col-lg-12">
                    <form id="changepasswordform" action="{{route('change.password')}}" method="post" class="form-wrapper">
                        @csrf
                        <input type="password" required="true" class="form-control" name="password_old" placeholder="Mật khẩu cũ">
                        <input type="password" required="true" class="form-control" name="password_new" placeholder="Mật khẩu mới">
                        <input type="password" required="true" class="form-control" name="password_check" placeholder="Nhập lại mật khẩu">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
        <hr class="invis">
        <br>
        <div class="custombox clearfix">
            <h4 class="small-title">Đổi thông tin cá nhân</h4>
            <div class="row">
                <div class="col-lg-12">
                    <form id="changeinfomationuserform" action="{{route('change.infomation.user')}}" method="post" class="form-wrapper">
                        @csrf
                        <input type="text" required="true" class="form-control" name="Hoten" placeholder="Họ và tên" value="{{$infomation_user->Hoten}}">
                        <input type="number" required="true" maxlength="10" name="Sodienthoai" class="form-control" placeholder="Số điện thoại" value="{{$infomation_user->Sodienthoai}}">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                        <br>
                        <div class="blog-tags">
                            <h4>Các từ khóa</h4>
                            <div class="tag-item">
                                <a href="#">Towel</a>
                                <a href="#">Shoes</a>
                                <a href="#">Coat</a>
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

@section('script')
<script type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

    $("#changepasswordform").validate({
        rules: {
            password_old: {
                required: true,
                minlength: 8,
                maxlength: 15
            },
            password_new: {
                required: true,
                minlength: 8,
                maxlength: 15
            },
            password_check: {
                required: true,
                minlength: 8,
                maxlength: 15
            },
        },
        messages: {
            password_old: {
                required: "Vui lòng nhập vào mật khẩu cũ",
                minlength: "Độ dài tối thiểu 8 kí tự",
                maxlength: "Độ tài tối đa 15 kí tự"
            },
            password_new: {
                required: "Vui lòng nhập mật khẩu mới",
                minlength: "Độ dài tối thiểu 8 kí tự",
                maxlength: "Độ tài tối đa 15 kí tự"
            },
            password_check: {
                required: "Vui lòng nhập mật khẩu mới",
                minlength: "Độ dài tối thiểu 8 kí tự",
                maxlength: "Độ tài tối đa 15 kí tự"
            }
        }
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function () {
    $("#changeinfomationuserform").validate({
          rules: {
            Hoten:{
                required:true,
                minlength:8,
                maxlength:30
            },
            Sodienthoai: {
              required: true,
              minlength:9,
              maxlength:11
            }
          },
          messages: {
            Hoten: {
              required: "Vui lòng nhập vào họ tên của bạn",
              minlength: "Độ dài tối thiểu 8 ký tự",
              maxlength:"Độ dài tối thiểu 30 ký tự"
            },
            Sodienthoai: {
              required: "Vui lòng nhập vào số điện thoại của bạn",
              minlength: "Độ dài tối thiểu 9 ký tự",
              maxlength:"Độ dài tối đa 11 ký tự"
            }
        }
    });
});
</script>
@endsection