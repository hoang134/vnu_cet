$(document).ready(function () {

    $("#loginform").validate({
      	rules: {
        	Email: {
          		required: true,
          		email: true
        	},
        	password: {
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
        	password: {
          		required: "Vui lòng nhập mật khẩu!",
          		minlength: "Độ dài tối thiểu 6 kí tự",
          		maxlength: "Độ tài tối đa 15 kí tự"
        	}
      	}
    });
});