<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cet;

class CetInfomationController extends Controller
{
    public function cet_infomation_home() {
        $infomation_home = DB::table('cet_infomation')->select('content')->orderBy('id','desc')->limit(1)->get();
        $infomation_kythi = DB::table('cet_kythi')->orderBy('Handangky','desc')->limit(3)->get();
        $infomation_sukien = DB::table('cet_event')->orderBy('id','desc')->limit(3)->get();
        return view('user.cet-infomation.cet-home',[
            'infomation_home'=>$infomation_home,
            'infomation_kythi' => $infomation_kythi,
            'infomation_sukien' => $infomation_sukien]);
    }

    public function cet_infomation_cocau() {
        $infomation_cocau = DB::table('cet_infomation')->select('content2')->orderBy('id','desc')->limit(1)->get();
        $infomation_kythi = DB::table('cet_kythi')->orderBy('Handangky','desc')->limit(3)->get();
        $infomation_sukien = DB::table('cet_event')->orderBy('id','desc')->limit(3)->get();
        return view('user.cet-infomation.cet-cocau',[
            'infomation_cocau' => $infomation_cocau,
            'infomation_kythi' => $infomation_kythi,
            'infomation_sukien' => $infomation_sukien]);
    }

    public function cet_infomation_chucnang() {
        $infomation_home = DB::table('cet_infomation')->select('content3')->orderBy('id','desc')->limit(1)->get();
        $infomation_kythi = DB::table('cet_kythi')->orderBy('Handangky','desc')->limit(3)->get();
        $infomation_sukien = DB::table('cet_event')->orderBy('id','desc')->limit(3)->get();
        return view('user.cet-infomation.cet-chucnang',[
            'infomation_home'=>$infomation_home,
            'infomation_kythi' => $infomation_kythi,
            'infomation_sukien' => $infomation_sukien]);
    }
}
