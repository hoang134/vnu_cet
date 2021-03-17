<?php 
namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class Checkuser {
    public static function checkProfile()    
    {           
    	$tendangnhap = Auth::user()->tendangnhap;
    	$profile = DB::select("select tendangnhap from cet_student_info where tendangnhap = '$tendangnhap'");
    	if($profile) {
    		return true;
    	}
    	else {
    		return  false; 
    	}   
    }

    public static function checkExam() {
    	$tendangnhap = Auth::user()->tendangnhap;
    	$profileExam = DB::select("select username from cet_student_cathi where username = '$tendangnhap'");
    	if($profileExam) {
    		return true;
    	}
    	else {
    		return false;
    	}
    }

    public static function cetconnect($tennguoithi,$khoanguoithi) {
        $link = mysqli_connect('localhost',$tennguoithi,$khoanguoithi,'cet_dkythi');
        return $link;
    }

    public static function query_result($link,$sql) {
        $query_result = mysqli_query($link,$sql);
        return $query_result;
    }

    public static function checkLoginFail() {
    	
    }

    public static function isOnline($id) {
        return Cache::has('user-is-online-' . $id);
    }

    public static function online() {
        $dem = 0;
        $users = DB::select("select id from cet_student_acc");
        foreach ($users as $key => $value) {
            if(Checkuser::isOnline($value->id)) {
                $dem++;
            }
        }
        return $dem;
    }

    public static function access_total() {
        $cookie = 'nei';
        $tid = 36288000;
        $file = public_path('count.txt');//file lưu lại số lầi truy cập
        if($cookie != "ja") {
        }
        else {
            if(file_exists($file)) {
                $fil = fopen($file, "r");
                $count = fread($fil, 8);
                fclose($fil);
            }
            else {
                $count=0;
            }
            $count++;
            $fil = fopen($file, "w");
            fwrite($fil, $count);
            fclose($fil);
        }
    }
}