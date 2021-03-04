<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        return view('user.cet-infomation.trangchu');
    }

    public function question()
    {
        $questions = DB::table('questions')->where('type',Question::QUESTION_PUBLIC)->get();
        $infomation_kythi = DB::table('cet_kythi')->orderBy('Handangky','desc')->limit(2)->get();
        $infomation_sukien = DB::table('cet_event')->orderBy('id','desc')->limit(2)->get();
        return view('home.question.question',[
            'questions'=> $questions,
            'infomation_kythi' => $infomation_kythi,
            'infomation_sukien' => $infomation_sukien
        ]);
    }

    public function question_detail($id) {
        $question = DB::table('questions')->where('questions.id',$id)->get();
        $question_detail = DB::table('question_replies')
        ->where('question_replies.question_id',$id)
        ->get();
        return view('home.question.question-detail',[
            'question' => $question,
            'question_detail' => $question_detail]);
    }
}
