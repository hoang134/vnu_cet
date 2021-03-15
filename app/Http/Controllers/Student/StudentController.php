<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;



class StudentController extends Controller
{
    public function createQuestion(Request $request)
    {
        $question = new Question();
        $question->user_id = Auth::user()->id;
        $question->content = $request->question;
        $question->type = Question::QUESTION_PRIVATE;
        $question->save();
        return redirect()->route('student.my.question');
    }

    public function myQuestion()
    {
        $questions = Auth::user()->questions;
        return view('home.question.question',[
            'questions'=> $questions
        ]);
    }

    public function listExam()
    {
        $exams = DB::table('cet_student_cathi')->select('Makythi')->where('username',Auth::user()->tendangnhap)
            ->where('checked','=','1')->groupBy('Makythi')->get();
//        dd($exams);
        return view('user.user-infomation.list-register-exam',[
            'exams' => $exams,
        ]);
    }

    public function inforRegisterExam($makythi)
    {
        $studentInfor = DB::table('cet_student_info')->where('tendangnhap',Auth::user()->tendangnhap)->first();
        $inforExams = DB::table('cet_student_cathi')->where('Makythi',$makythi)
            ->where('username',Auth::user()->tendangnhap)
            ->where('checked','=',1)
            ->get();
//       dd($inforExams);
        $kythi = DB::table('cet_kythi')->where('MaKythi',$makythi)->first();
        $kythiStudents = DB::table('cet_kythi_students')->where('username',Auth::user()->tendangnhap)
            ->where('Makythi',$makythi)->get();
        $contentQR = 'Họ tên : ' .$studentInfor->Hoten . ' Số CMND : ' . $studentInfor->SoCMND."\n";
        $contentQR .= 'Tên kỳ thi : '.$kythi->TenKythi."\n";
        foreach ($inforExams as $inforExam)
        {   $monthi = DB::table('cet_monthi')
            ->where('MaMonthi',$inforExam->Mamonthi)->first();
            $contentQR .= 'Môn thi : '.$monthi->TenMonThi." Ca thi : ".$inforExam->Cathi."\n";
            $diaDiemThi = \Illuminate\Support\Facades\DB::table('cet_diadiemthi')->where('MaDiadiem',$inforExam->Madiemthi)->first();
            $contentQR .= 'Phòng thi : ' . $diaDiemThi->Sophong . ' - ' . $diaDiemThi->TenDiadiem."\n";
        }

        $qrCode = QrCode::encoding('UTF-8')->generate($contentQR);

        return view('user.user-infomation.infor-register-exam',[
            'studentInfor' => $studentInfor,
            'inforExams' => $inforExams,
            'qrCode' => $qrCode,
            'kythi' => $kythi,
            'diaDiemThi' => $diaDiemThi,
            'kythiStudents' => $kythiStudents,
        ]);
    }

    public function printGrade($makythi)
    {
        $studentInfor = DB::table('cet_student_info')->where('tendangnhap',Auth::user()->tendangnhap)->first();
        $inforExams = DB::table('cet_student_cathi')->where('Makythi',$makythi)
            ->where('username',Auth::user()->tendangnhap)
            ->where('checked','=',1)
            ->get();
        $kythi = DB::table('cet_kythi')->where('MaKythi',$makythi)->first();
        $kythiStudents = DB::table('cet_kythi_students')->where('username',Auth::user()->tendangnhap)
            ->where('Makythi',$makythi)->get();
       // $diaDiemThi = \Illuminate\Support\Facades\DB::table('cet_diadiemthi')->where('MaDiadiem',$inforExam->Madiemthi)->first();
        $contentQR = 'Họ tên : ' .$studentInfor->Hoten . ' Số CMND : ' . $studentInfor->SoCMND."\n";
        $contentQR .= 'Tên kỳ thi : '.$kythi->TenKythi."\n";
        foreach ($inforExams as $inforExam)
        {   $monthi = DB::table('cet_monthi')
            ->where('MaMonthi',$inforExam->Mamonthi)->first();
            $contentQR .= 'Môn thi : '.$monthi->TenMonThi." Ca thi : ".$inforExam->Cathi."\n";
            $diaDiemThi = \Illuminate\Support\Facades\DB::table('cet_diadiemthi')->where('MaDiadiem',$inforExam->Madiemthi)->first();
            $contentQR .= 'Phòng thi : ' . $diaDiemThi->Sophong . ' - ' . $diaDiemThi->TenDiadiem."\n";
        }
        //$contentQR .= 'Phòng thi : ' . $diaDiemThi->Sophong . ' - ' . $diaDiemThi->TenDiadiem."\n";
        $qrCode = QrCode::encoding('UTF-8')->generate($contentQR);
        $totalGrade = 0;
        foreach ($kythiStudents as $kythiStudent)
        {
            $totalGrade += $kythiStudent->Ketqua;
        }
        return view('user.user-infomation.print-grade',[
            'studentInfor' => $studentInfor,
//            'inforExams' => $inforExams,
            'qrCode' => $qrCode,
            'kythi' => $kythi,
            'diaDiemThi' => $diaDiemThi,
            'kythiStudents' => $kythiStudents,
            'totalGrade' => $totalGrade
        ]);
    }

    public function payment()
    {
        $paymentMenthods = PaymentMethod::all();
        return view('user.user-infomation.payment',[
            'paymentMenthods' => $paymentMenthods
        ]);
    }

    public function paymentStore( Request  $request)
    {
        DB::table('payments');
        dd($request->all());
    }
}
