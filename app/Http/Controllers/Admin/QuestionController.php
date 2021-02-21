<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{

    public function index()
    {
        $questions = DB::table('questions')->orderBy('created_at','desc')->get();
        //dd($questions->first()->id);
        return view('admin.question.question',[
            'questions'=>$questions
        ]);
    }

    public function reply(Request $request)
    {
        $question = Question::find($request->id);
        if ($question->questionReply == null)
        {
            $questionReply = new QuestionReply();
            $questionReply->question_id = $request->id;
            $questionReply->content = $request->question;
            $questionReply->save();
        }
        else
        {
            DB::table('question_replies')->where('question_id',$question->id)->update(['content'=>"$request->question"]);

        }
    }

    public function getQuestionReply(Request $request)
    {
        $question = Question::find($request->id);
        $questionReply = $question->questionReply == null? "---": $question->questionReply->content;
        if(!$questionReply)
            echo"<td class=\"inbox-small-cells\"><i class=\"fa fa-star\"style= color:blue></i></td>";
        else
            echo "<td class=\"inbox-small-cells\"><i class=\"fa fa-star\"></i></td>";
        echo "
            <td class=\"view-message dont-show\">{$question->user->Hoten}</td>
            <td class=\"view-message\"><a  class=\"content-question\" data-id =\"{$question->id}\" data-toggle=\"modal\" data-target=\"#exampleModal\" data-whatever=\"@mdo\">{$question->content}</a></td>
            <td class=\"view-message\"><span class='badge badge-success'>{$question->type}</span></td>
            <td class=\"view-message\">{$questionReply}</td>
            <td class=\"view-message\">
            <button class=\"reply\" data-id='{$question->id}'>trả lời</button>
            <button class=\"change-type\" data-id='$question->id'>Loại câu hỏi</button>
            </td>

       ";
    }

    public function create()
    {

        return view('admin.question.add-edit-question');
    }

    public function save(Request $request)
    {
       // dd($request->all());
        $question = new Question();
        $question->user_id = Auth::user()->id;
        $question->content = $request->question;
        $question->type = Question::QUESTION_PUBLIC;
        $question->save();

        $questionReply = new QuestionReply();
        $questionReply->question_id = $question->id;
        $questionReply->content = $request->questionReply;
        $questionReply->save();

        return redirect()->route('admin.question.index');

    }

    public function changeType(Request $request)
    {
        $question = Question::find($request->id);
        if($question->type == Question::QUESTION_PUBLIC)
        {
            $question->type = Question::QUESTION_PRIVATE;
            $question->save();
        }
        else
        {
            $question->type = Question::QUESTION_PUBLIC;
            $question->save();
        }
    }

    public function edit(Request $request)
    {
        $question = Question::find($request->id);
        $question->content = $request->question;
        $question->save();
    }

    public function search(Request $request)
    {
        $questions = DB::table('questions')->orderBy('created_at','desc')->where('content','like','%'.$request->keySearch.'%')->get();
        //dd($questions->first()->id);
        return view('admin.question.question',[
            'questions'=>$questions
        ]);
    }
}

