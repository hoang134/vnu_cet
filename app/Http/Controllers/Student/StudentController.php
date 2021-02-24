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
        $exams = DB::table('cet_student_cathi')->where('username',Auth::user()->tendangnhap)
            ->where('checked','!=','0')->get();
        return view('user.user-infomation.list-register-exam',[
            'exams' => $exams,
        ]);
    }

    public function inforRegisterExam($id)
    {
        $studentInfor = DB::table('cet_student_info')->where('tendangnhap',Auth::user()->tendangnhap)->first();
        $inforExam = DB::table('cet_student_cathi')->where('id',$id)->first();
        $kythi = DB::table('cet_kythi')->where('MaKythi',$inforExam->Makythi)->first();
        $diaDiemThi = \Illuminate\Support\Facades\DB::table('cet_diadiemthi')->where('MaDiadiem',$inforExam->Madiemthi)->first();
        $contentQR = 'Họ tên : ' .$studentInfor->Hoten . ' Số CMND : ' . $studentInfor->SoCMND."\n";
        $contentQR .= 'Tên kỳ thi : '.$kythi->TenKythi."\n";
        $contentQR .= 'Phòng thi : ' . $diaDiemThi->Sophong . ' - ' . $diaDiemThi->TenDiadiem."\n";
        $qrCode = QrCode::encoding('UTF-8')->generate($contentQR);

        return view('user.user-infomation.infor-register-exam',[
            'studentInfor' => $studentInfor,
            'inforExam' => $inforExam,
            'qrCode' => $qrCode,
            'kythi' => $kythi,
            'diaDiemThi' => $diaDiemThi,
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
