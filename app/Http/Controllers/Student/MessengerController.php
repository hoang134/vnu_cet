<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Messenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessengerController extends Controller
{
    public function messenger()
    {
        $messengers = DB::table('messengers')->where('user_from', Auth::user()->tendangnhap)->where('user_to', 'admin')
            ->orWhere('user_to', Auth::user()->tendangnhap)->where('user_from', 'admin')->get();

        return view('user.messengers.index', [
            'messengers' => $messengers
        ]);
    }

    public function reply(Request $request)
    {
        $messenger = new Messenger();
        $messenger->user_from = Auth::user()->tendangnhap;
        $messenger->user_to = 'admin';
        $messenger->content = $request->messenger;
        $messenger->belong = Messenger::BELONG_USER;
        $messenger->save();

        echo '<li class="out">
                <div class="chat-body">
                    <div class="chat-message">
                        <h5>' .
            Auth::user()->Hoten . '</h5>
                        <p>' . $messenger->content .
            '</p>
                    </div>
                </div>
            </li>';
    }
}
