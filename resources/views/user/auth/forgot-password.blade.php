<!DOCTYPE html>
<html>

<head>
    <title>Trang đăng nhập</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/libs3/login.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
</head>

<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="{{asset('images/logo.png')}}" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form id="forgotpasswordform" action="{{route('send.forgotpassword')}}"  method="post">
                        @csrf
                        <center>
                          <div class="mb-3">
                            <div class="">
                              <h2 style="font-size: 30px;color:#007f49; ">Lấy lại mật khẩu</h2>
                            </div>
                          </div>
                        </center>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="Email" class="form-control input_user" value="" placeholder="Nhập email">
                        </div>
                        <small><label id="Email-error" class="error" for="Email"></label></small>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="login" class="btn login_btn">Gửi</button>
                       </div>
                    </form>
                </div>

                <div class="mt-2">
                    <div class="d-flex justify-content-center links">
                        Bạn chưa có tài khoản? <a href="{{route('register')}}" class="ml-2">Đăng ký</a>
                    </div>
                    <div class="d-flex justify-content-center links">
                        <a href="{{route('login')}}">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{asset('js/libs3/validate/validate_forgotpassword.js')}}">
    </script>
    @if(Session::has('success'))
        <script type="text/javascript">
            toastr.success("{!!Session::get('success')!!}");
        </script>
    @endif
    @if(Session::has('error'))
        <script type="text/javascript">
            toastr.error("{!!Session::get('error')!!}");
        </script>
    @endif
</body>
</html>
