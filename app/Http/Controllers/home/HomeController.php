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
        return redirect()->route('cet.home');
    }

    public function question()
    {
        $questions = DB::table('questions')->where('type',Question::QUESTION_PUBLIC)->get();

        return view('home.question.question',[
            'questions'=> $questions
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
