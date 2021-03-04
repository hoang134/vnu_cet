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