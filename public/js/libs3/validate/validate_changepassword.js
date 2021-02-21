$(document).ready(function () {
    $("#changepasswordform").validate({
        rules: {
          	password_old:{
          		required:true,
          		minlength:6,
          		maxlength:15
	        },
	        password_new: {
	            required: true,
	            minlength:6,
	            maxlength:15
	        },
	        password_check:{
	            required:true,
	           	minlength:6,
	           	maxlength:15
	        }
    	},
        messages: {
            password_old: {
              	required: "Vui lòng nhập vào mật khẩu cũ",
              	minlength: "Mật khẩu dài tối thiểu 6 ký tự",
              	maxlength:"Mật khẩu dài tối đa 15 ký tự"
            },
            password_new: {
              	required: "Vui lòng nhập vào mật khẩu cũ",
              	minlength: "Mật khẩu dài tối thiểu 6 ký tự",
              	maxlength:"Mật khẩu dài tối đa 15 ký tự"
            },
            password_check: {
              	required: "Vui lòng nhập vào mật khẩu cũ",
              	minlength: "Mật khẩu dài tối thiểu 6 ký tự",
              	maxlength:"Mật khẩu dài tối đa 15 ký tự"
            },
        }
    });
});