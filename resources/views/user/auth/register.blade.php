<!DOCTYPE html>
<html>
    
<head>
    <title>Trang đăng ký</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/libs3/login.css')}}">
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
                    <form id="registerform" action="{{route('register.verify')}}"  method="post">
                        @csrf
                        <center>
                          <div class="mb-3">
                            <div class="">
                              <h2 style="font-size: 30px;color:#007f49; ">TRANG ĐĂNG KÝ</h2>
                            </div>
                          </div>
                        </center>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="name" class="form-control input_user" value="" placeholder="Tên của bạn">
                        </div>
                        <small><label id="name-error" class="error" for="name" style=""></label></small>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="email" name="Email" class="form-control input_pass" value="" placeholder="Email">
                        </div>
                        <small><label id="Email-error" class="error" for="Email"></label></small>   
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" autocomplete="new-password" class="form-control input_pass" value="" placeholder="Mật khẩu">
                        </div>
                        <small><label id="password-error" class="error" for="password"></label></small>
                        
                    <div class="d-flex justify-content-center mt-1 login_container">
                    <button type="submit" name="login" class="btn login_btn">Đăng ký</button>
                   </div>
                    </form>
                </div>
        
                <div class="mt-1">
                    <div class="d-flex justify-content-center links">
                        Bạn đã có tài khoản? <a href="{{route('login')}}" class="ml-2">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{asset('js/libs3/validate/validate_register.js')}}"></script>
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
