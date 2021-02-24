<?php

namespace App\Http\Controllers\Admin;

use App\Models\CetDichVu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CetXacNhanDiemThiController extends Controller
{

    public function index()
    {
        $cet_dichvus = CetDichVu::all();

        return view('admin.xac-nhan-diem-thi.index',[
            'cet_dichvus'=> $cet_dichvus
        ]);
    }

    public function handle(Request $request)
    {
        $xacnhandiemthi = DB::table('cet_xac_nhan_diem_thi')->where('tendangnhap',$request->tendangnhap)->first();
        $makythis = json_decode($xacnhandiemthi->makythi);
        $Hoten = DB::table('cet_student_acc')->where('tendangnhap',$request->tendangnhap)->first()->Hoten;

        return view('admin.xac-nhan-diem-thi.handle',[
            'Hoten' => $Hoten,
            'makythis' => $makythis
        ]);
    }
}
