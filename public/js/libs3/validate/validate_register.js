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

        if (okie) document.getElementById("loginform").submit();
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