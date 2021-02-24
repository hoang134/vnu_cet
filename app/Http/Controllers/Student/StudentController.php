<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function test() {
        return "test";
    }
}
