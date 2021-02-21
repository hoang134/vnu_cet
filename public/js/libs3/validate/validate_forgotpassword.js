$(document).ready(function () {

    $("#forgotpasswordform").validate({
        rules: {
            Email: {
              	required: true,
              	email: true
           	}
        },
        messages: {
            Email: {
              	required: "Vui lòng nhập vào email",
              	email: "Nhập đúng định dạng email"
            }
        }
    });
});