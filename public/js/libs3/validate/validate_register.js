$(document).ready(function () {

    $("#registerform").validate({
        rules: {
            Email: {
                required: true,
                email: true
            },
            name: {
                required: true,
                minlength: 8,
                maxlength: 30
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 15
            },
            repassword: {
                required: true,
                minlength: 6,
                maxlength: 15
            }
        },
        messages: {
            Email: {
                required: "Vui lòng nhập vào email",
                email: "Nhập đúng định dạng email đê"
            },
            name: {
                required: "Vui lòng nhập vào họ tên",
                minlength: "Độ dài tối thiểu 8 kí tự",
                maxlength: "Độ dài tối đa 30 ký tự"
            },
            password: {
                required: "Vui lòng nhập mật khẩu!",
                minlength: "Độ dài tối thiểu 6 kí tự",
                maxlength: "Độ tài tối đa 15 kí tự"
            },
            repassword: {
                required: "Vui lòng nhập mật khẩu!",
                minlength: "Độ dài tối thiểu 6 kí tự",
                maxlength: "Độ tài tối đa 15 kí tự"
            }
        }
    });
});    