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

        echo '<div class="d-flex justify-content-end mb-4">
                <div class="msg_cotainer_send">' .
            $messenger->content .
            '<!-- <span class="msg_time_send">{{$messenger->created_at}}</span> -->
                </div>
                <div class="img_cont_msg">
              <img src="' . asset('/images/1.png') . '" class="rounded-circle user_img_msg">
                </div>
              </div>';
    }
}
