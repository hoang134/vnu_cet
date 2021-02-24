<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CetDichVu;
use App\Models\CetStudentKyThi;
use App\Models\CetXacNhanDiemThi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CetXacNhanDiemThiController extends Controller
{
    public function index()
    {
        $kythis = DB::table('cet_xac_nhan_diem_thi')->where('tendangnhap',Auth::user()->Email)->first();
        $kythis = json_decode($kythis->makythi);

        return view('user.xac-nhan-diem-thi.index',[
            'kyThis' => $kythis
        ]);
    }

    public function store(Request $request)
    {

        $xacnhandiemthi = new CetXacNhanDiemThi();
        $xacnhandiemthi->tendangnhap = Auth::user()->tendangnhap;
        $xacnhandiemthi->lydo = $request->lydo;
        $xacnhandiemthi->lephi = 50000;
        $xacnhandiemthi->makythi = json_encode($request->makythis);
        $xacnhandiemthi->save();

        $cet_dichvu = new CetDichVu();
        $cet_dichvu->tendangnhap = Auth::user()->tendangnhap;
        $cet_dichvu->tendichvu = "xacnhandiemthi";
        $cet_dichvu->trangthaithanhtoan = CetDichVu::TTCHUATHANHTOAN;
        $cet_dichvu->tendichvu = CetDichVu::TTCHUATHUCHIEN;
        $cet_dichvu->save();
    }
}
