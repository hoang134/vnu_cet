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
        $cet_dichvus = CetDichVu::where('tendangnhap',Auth::user()->tendangnhap)->get();
        //dd($cet_dichvus);
        return view('user.xac-nhan-diem-thi.index',[
            'cet_dichvus' => $cet_dichvus
        ]);
    }

    public function createRequire()
    {
        $kythis = DB::table('cet_student_cathi')->where('username',Auth::user()->tendangnhap)
            ->where('checked','=',1)->get();
        return view('user.xac-nhan-diem-thi.create-require',[
            'kyThis' => $kythis
        ]);
    }
    public function store(Request $request)
    {
      DB::beginTransaction();
        try {
            $xacnhandiemthi = new CetXacNhanDiemThi();
            $xacnhandiemthi->tendangnhap = Auth::user()->tendangnhap;
            $xacnhandiemthi->lydo = $request->lydo;
            $xacnhandiemthi->makythi = json_encode($request->makythis);
            if ($request->noinhan == CetXacNhanDiemThi::NHAN_TAI_TRUNG_TAM)
                $xacnhandiemthi->noinhan = CetXacNhanDiemThi::NHAN_TAI_TRUNG_TAM;
            else
                    $xacnhandiemthi->noinhan = $request->address;
            $xacnhandiemthi->save();

            $cet_dichvu = new CetDichVu();
            $cet_dichvu->tendangnhap = Auth::user()->tendangnhap;
            $cet_dichvu->tendichvu = "xacnhandiemthi";
            $cet_dichvu->dichvu_id = $xacnhandiemthi->id;
            $cet_dichvu->trangthaithanhtoan = CetDichVu::TTCHUATHANHTOAN;
            $cet_dichvu->trangthaithuchien = CetDichVu::TTCHUATHUCHIEN;
            $cet_dichvu->save();
            DB::commit();
            return redirect()->route('student.xacnhandiemthi')->with('success','Thành công');
        } catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('student.xacnhandiemthi')->with('error',$e);
    }

    }
}
