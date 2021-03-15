<head>
    <title>Trang đăng ký</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/libs3/login.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>

<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card" style="height: 510px;">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="{{asset('images/logo.png')}}" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form id="registerform" method="post" action="{{route('register.verify')}}">
                        @csrf
                        <center>
                          <div class="mb-0">
                            <div class="">
                              <h2 style="font-size: 30px;color:#007f49; ">TRANG ĐĂNG KÝ</h2>
                            </div>
                          </div>
                        </center>

                        <div class="input-group mb-1">
                            <div class=" input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>

                            <input type="text" name="name" id="name" class="form-control input_user" value="" placeholder="Họ và tên">
                        </div>
                        <small><span id="name-error" class="error" for="name"></span></small>

                        <div class="input-group mb-1">
                            <div class=" input-group-append">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>

                            <input type="text" name="Email" id="Email" autocomplete="Email" class="form-control input_user" value="" placeholder="Email">
                        </div>
                        <small><span id="Email-error" class="error" for="Email"></span></small>
                        
                        <div class="input-group mb-1">
                            <div class=" input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>

                            <input type="password" name="password" id="password" autocomplete="current-password" class="form-control input_pass" value="" placeholder="Mật khẩu" minlength="6" maxlength="15">
                        </div>
                        <small><span id="password-error" class="error" for="password"></span></small>

                        <div class="input-group mb-1">
                            <div class=" input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>

                            <input type="password" name="repassword" id="repassword" autocomplete="current-password" class="form-control input_pass" value="" placeholder="Nhập lại mật khẩu" minlength="6" maxlength="15" onkeyup="javascript:DoKeyup(event, this, 'register');">
                        </div>
                        <small><span id="repassword-error" class="error" for="repassword"></span></small>
                        
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline" onclick="javascript:showhide();">
                                <label class="custom-control-label" for="customControlInline">Hiện mật khẩu</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-0 login_container">
                            <input type="button" id="register" onclick = "javascript:Chapnhan();" class="btn login_btn" value="Đăng ký"/>
                        </div>
                    </form>
                </div>
        
                <div class="mt-0">
                    <div class="d-flex justify-content-center links">
                        Bạn đã có tài khoản?<a href="{{route('login')}}" class="ml-2">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
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

    <script type="text/javascript">

    function Chapnhan() {
        var okie = true; 
        document.getElementById('name-error').innerHTML = "";
        document.getElementById("Email-error").innerHTML = "";
        document.getElementById("password-error").innerHTML = "";
        document.getElementById("repassword-error").innerHTML = "";


        if (document.getElementById("name").value == "") {
            document.getElementById("name-error").innerHTML = "Bạn chưa nhập họ và tên.";
            document.getElementById("name").focus();
            okie = false;
        }
        if (document.getElementById("Email").value == "") {
            document.getElementById("Email-error").innerHTML = "Bạn chưa nhập email.";
            document.getElementById("Email").focus();
            okie = false;
        } else if (!checkEmail())                {
            document.getElementById("Email-error").innerHTML = "Email không đúng định dạng.";
            document.getElementById("Email").focus();
            okie = false;
        }

        if (document.getElementById("password").value == "") {
            document.getElementById("password-error").innerHTML = "Bạn chưa nhập mật khẩu.";
            document.getElementById("password").focus();
            okie = false;
        } else if (document.getElementById("repassword").value == "") {
            document.getElementById("repassword-error").innerHTML = "Bạn chưa nhập lại mật khẩu";
            document.getElementById("repassword").focus();
            okie = false;
        } else if (document.getElementById("password").value  != document.getElementById("repassword").value ) {
            document.getElementById("password-error").innerHTML = "Mật khẩu không trùng nhau.";
            document.getElementById("password").focus();
            okie = false;
        }

        if (document.getElementById("password").value.length < "6" && document.getElementById("password").value.length > "1") {
            document.getElementById("password-error").innerHTML = "Mật khẩu có độ dài tối thiểu 6 ký tự.";
            document.getElementById("password").focus();
            okie = false;
        }

        if (document.getElementById("password").value.length > "15") {
            document.getElementById("password-error").innerHTML = "Mật khẩu có độ dài tối đa 15 ký tự.";
            document.getElementById("password").focus();
            okie = false;
        }

        if (document.getElementById("repassword").value.length < "6" && document.getElementById("repassword").value.length > "1") {
            document.getElementById("repassword-error").innerHTML = "Mật khẩu có độ dài tối thiểu 6 ký tự.";
            document.getElementById("repassword").focus();
            okie = false;
        }

        if (document.getElementById("repassword").value.length > "15") {
            document.getElementById("repassword-error").innerHTML = "Mật khẩu có độ dài tối đa 15 ký tự.";
            document.getElementById("repassword").focus();
            okie = false;
        }

        if (okie) document.getElementById("registerform").submit();
    }

    function checkEmail() {
        var email = document.getElementById('Email');
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(email.value)) {
            return false;
        }
        else
        {
            return true;
        }
    }

    function showhide() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }

        var y = document.getElementById("repassword");
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }

    function DoKeyup(e, myself, nextcontrolid) {
        if (window.event) e = window.event;
        if (e.keyCode == 13) {
            document.getElementById(nextcontrolid).focus();
        }
    }
</script>
</body>
</html>
