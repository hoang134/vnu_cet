<?php 
namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Checkuser {
    public static function checkProfile()    
    {           
    	$Email = Auth::user()->Email;
    	$profile = DB::select("select * from cet_student_info where Email = '$Email'");
    	if($profile) {
    		return true;
    	}
    	else {
    		return  false; 
    	}   
    }

    public static function checkExam() {
    	$Email = Auth::user()->Email;
    	$profileExam = DB::select("select * from cet_student_cathi where username = '$Email'");
    	if($profileExam) {
    		return true;
    	}
    	else {
    		return false;
    	}
    }

    public static function cetconnect() {
        $tennguoithi = $_SESSION["tennguoithi"];
        $khoanguoithi = $_SESSION["khoanguoithi"];
        $link = mysqli_connect('localhost',$tennguoithi,$khoanguoithi,'cet_dkythi');
        return $link;
    }

    public static function query_result($link,$sql) {
        $query_result = array();
        $query_result = mysqli_query($link,$sql);
        return $query_result;
    }
}