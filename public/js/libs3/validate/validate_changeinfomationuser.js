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