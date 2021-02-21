<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function getLogin()
    {
        return view('user.auth.login');
    }

    public function login( Request $request)
    {
    
        $credentials = $request->only(['Email', 'password']);
        if(auth()->attempt($credentials))
        {
            if(Auth::user()->Trangthai == 1) {
        		session_start();
        		$_SESSION["tennguoithi"] = $request->Email;
        		$_SESSION["khoanguoithi"] = $request->password;
                return redirect()->route('home')->with('success','Đăng nhập thành công.');
            } else {
                return redirect()->route('login')->with('error','Tài khoản chưa được xác nhận.');
            }
        }
        else if(Auth::guard('admin')->attempt($credentials))
        {
            return redirect()->route('admin.home')->with('success','Đăng nhập thành công.');
        }
        else 
        {
            return redirect()->route('login')
                ->with('error','Tài khoản hoặc mật khẩu không chính xác.');
        }
    }

    public function register() {
        return view('user.auth.register');
    }

    public function change_user_infomation() {
        $Email = Auth::user()->Email;
        $infomation_kythi = DB::table('cet_kythi')->orderBy('Handangky','desc')->limit(3)->get();
        $infomation_sukien = DB::table('cet_event')->orderBy('id','desc')->limit(3)->get();
        $infomation_user = DB::table('cet_student_acc')->where('Email',$Email)->first();
        return view('user.auth.change-password',[
            'infomation_kythi' => $infomation_kythi,
            'infomation_sukien' => $infomation_sukien,
            'infomation_user' => $infomation_user]);
    }

    public function save_change_password(Request $request) {

        $validatedData = $request->validate([
            'password_old' => 'bail|required|min:6|max:10',
            'password_new' => 'bail|required|min:6|max:10',
            'password_check' => 'bail|required|min:6|max:10'
        ]);

        $Email = Auth::user()->Email;
        $user = DB::select("select * from cet_student_acc where Email = '$Email'");
        if(password_verify($request->password_old,Auth::user()->password)) {
            $password_new_1 = bcrypt($request->password_new);
            DB::select("update cet_student_acc set password = '$password_new_1' where Email = '$Email'");
            return redirect()->route('change.infomation')->with('success','Đổi mật khẩu thành công');
        }
        else if(!password_verify($request->password_old,Auth::user()->password)) {
            return redirect()->route('change.infomation')->with('error','Mật khẩu không đúng');
        }
    }

    public function save_change_user_infomation(Request $request) {
        $Email = Auth::user()->Email;
        DB::select("update cet_student_acc set tendangnhap='$request->tendangnhap',Hoten='$request->Hoten',Sodienthoai='$request->Sodienthoai' where Email = '$Email'");
        return redirect()->route('change.infomation')->with('success','Thay đổi thông tin thành công');
    }

    public function forgot_password() {
        return view('user.auth.forgot-password');
    }

    public function username()
    {
        return 'username';
    }

    public function logout()
    {
        setcookie('username_cookie','',time()+1000);
        setcookie('password_cookie','',time()+1000);
        Auth::logout();
        return redirect()->route('home');
    }
    public function logout_admin()
    {
        setcookie('username_cookie','',time()+1000);
        setcookie('password_cookie','',time()+1000);
        auth()->guard()->logout();
        return redirect()->route('home');
    }
}
