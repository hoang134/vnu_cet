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

<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
    <div class="page-wrapper">
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
@section('content_extend')
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">
        <div class="widget">
            <h2 class="widget-title" style="text-transform: uppercase;font-size: 30px;">Sự kiện mới</h2>
            <br>
            <div class="trend-videos">
                @foreach($infomation_sukien as $infomation_sukien_value)
                <div class="blog-box">
                    <div class="post-media">
                        <a href="tech-single.html" title="">
                            <img src="{{asset('images/latest-1.jpg')}}" alt="" class="img-fluid">
                            <div class="hovereffect">
                                <span class="videohover"></span>
                            </div>
                        </a>
                    </div>
                    <div class="blog-meta">
                        <h4><a href="tech-single.html" title="">{{$infomation_sukien_value->title}}</a></h4>
                    </div>
                </div>

                <hr class="invis">
                @endforeach
            </div>
        </div>

        <br>

        <div class="widget">
            <h2 class="widget-title" style="text-transform: uppercase;font-size: 30px;">Các kỳ thi mới</h2>
            <br>
            <div class="blog-list-widget">
                <div class="list-group">
                    @foreach($infomation_kythi as $infomation_kythi_value)
                    <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
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
