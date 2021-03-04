<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{

    public function string_random($length) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    public function sendEmail(Request $request) {

    	$user_check = DB::select("select Email,tendangnhap from cet_student_acc where Email = '$request->Email'");
    	if($user_check) {
    		return redirect()->route('forgotpassword')->with('error','Email của bạn đã được đăng ký,hãy lấy lại mật khẩu.');
    	}

    	else {

            $email_cre = $request->Email;
            $password_cre = $request->password;
            $sql = "CREATE USER '$email_cre'@'localhost' IDENTIFIED BY '$password_cre'";
            DB::select($sql);
            DB::select("GRANT select,update,insert,delete ON cet_dkythi.cet_student_acc TO '$email_cre'@'localhost'");

	        $verify_code = $this->string_random(60);
	        $user = new User();
	        $user->Hoten = $request->name;
	        $user->tendangnhap = $request->Email;
	        $user->Email = $request->Email;
	        $user->password = bcrypt($request->password);
	        $user->verify = $verify_code;
	        $user->save();
	        $details = [
	            'password' => $request->password,
	            'verify_code' => $verify_code
	        ];

	        Mail::to($user->Email)->send(new SendEmail($details));
	        return redirect()->route('login')->with('success','Đăng ký thành công,hãy kiểm tra email của bạn.');
	    }
    }

    public function verifyUser(Request $request) {
        $verify_code = \Illuminate\Support\Facades\Request::get('code');
        $user = DB::table('cet_student_acc')->where('verify',$verify_code)->first();
        if($user!=null && $user->Trangthai!=1) {
            DB::select("update cet_student_acc set Trangthai = '1' where verify = '$verify_code'");
            return redirect()->route('login')->with('success','Bạn đã xác thực thành công.');
        }
        else if($user!=null &&$user->Trangthai==1) {
            return redirect()->route('login')->with('error','Tài khoản của bạn đã được xác thực từ trước.');
        }
        else {
        	return redirect()->route('login')->with('error','Đã xảy ra lỗi gì đó.');
        }
    }

    public function send_forgot_password(Request $request) {
        $user = DB::select("select * from cet_student_acc where Email='$request->Email'");
        if(!$user) {
            return redirect()->route('forgotpassword')->with('error','Email của bạn bị sai');
        }
        else {
            $password = $this->string_random(8);
            $password_bcrypt = bcrypt($password); 
            $details = [
                'password' => $password
            ];
            DB::select("update cet_student_acc set password='$password_bcrypt' where Email='$request->Email'");
            Mail::to($request->Email)->send(new ForgotPassword($details));
            return redirect()->route('login')->with('success','Lấy mật khẩu thành công,hãy kiểm tra email của bạn');
        }
    }

}
