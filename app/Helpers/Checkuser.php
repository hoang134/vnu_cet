<?php 
namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function checkLoginFail() {
    	
    }
}