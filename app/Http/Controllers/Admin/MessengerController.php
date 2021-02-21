<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Messenger;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MessengerController extends Controller
{

    public function index()
    {

       //$messengers = DB::table('messengers')->where('user_to',Auth::user()->tendangnhap)->orderBy('created_at','desc')->get();
       $listUserTos = DB::table('messengers')->select('user_to')->where('user_to','!=',Auth::user()->tendangnhap)
            ->groupBy('user_to')->get();


      return view('admin.messengers.index',[
          'listUserTos'=>$listUserTos
      ]);
    }

    public function detail( Request $request)
    {

        $messengers = DB::table('messengers')->where('user_from',Auth::user()->tendangnhap)->where('user_to',$request->tendangnhap)
            ->orWhere('user_to',Auth::user()->tendangnhap)->where('user_from',$request->tendangnhap)->get();

        return view('admin.messengers.detail-messenger',[
            'messengers'=> $messengers,
            'user_from'=> $request->tendangnhap,
        ]);
    }

    public function reply(Request $request)
    {
        $messenger = new Messenger();
        $messenger ->user_from = Auth::user()->tendangnhap;
        $messenger ->user_to = $request->tendangnhap;
        $messenger ->content = $request->messenger;
        $messenger ->belong = Messenger::BELONG_ADMIN;
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
