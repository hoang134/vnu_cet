<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cet;

class InfomationController extends Controller
{
    public function home() {
        return view('admin.layout');
    }
    public function edit_infomation()
    {   
         $infomation = DB::table('cet_infomation')->where('id','1')->first();
       return view('admin.infomation.cet-infomation')->with('infomation',$infomation);
    }

    public function edit_infomation_cocau()
    {   $infomation = DB::table('cet_infomation')->where('id','1')->first();
       return view('admin.infomation.cet-infomation-cocau')->with('infomation',$infomation);
    }

    public function edit_infomation_chucnang()
    {   $infomation = DB::table('cet_infomation')->where('id','1')->first();
       return view('admin.infomation.cet-infomation-chucnang')->with('infomation',$infomation);
    }

    public function edit_infomation_logo()
    {   $cet_infomation = Cet::all();
       return view('admin.infomation.cet-logo');
    }

    public function save_infomation(Request $request) {
        $checkdb = DB::select("select * from cet_infomation where id = 1");
        if(!$checkdb) {
            DB::select("insert into cet_infomation values('1','1','1','1')");
        }
        if(isset($request->noidung)) {
            DB::select("update cet_infomation set content = '$request->noidung' where id=1");
            return redirect()->route('admin.edit.infomation')->with('success','Cập nhật thành công.');
        }
        if(isset($request->noidung1)) { 
            DB::select("update cet_infomation set content2 = '$request->noidung1' where id=1");
            return redirect()->route('admin.edit.infomation.cocau')->with('success','Cập nhật thành công.');
        }
        if(isset($request->noidung2)) {
            DB::select("update cet_infomation set content3 = '$request->noidung2' where id=1");
            return redirect()->route('admin.edit.infomation.chucnang')->with('success','Cập nhật thành công.');
        }
    }
    public function save_logo(Request $request) {
    	$checkdb = DB::select("select * from cet_logo where id = 1");
        if(!$checkdb) {
            DB::select("insert into cet_logo values('1','1')");
        }
        if(isset($request->imagelogo)) {

        	$imagelogo = $request->file('imagelogo');
      
	        if($imagelogo){
	            $get_name_image = $imagelogo->getClientOriginalName();	
	            $name_image = current(explode('.',$get_name_image));
	            $new_image =  $name_image.'.'.$imagelogo->getClientOriginalExtension();
	            $imagelogo->move('images/logo',$new_image);
	            DB::select("update cet_logo set imagelogo = '$new_image' where id=1");
            	return redirect()->route('admin.edit.logo')->with('success','Cập nhật thành công.');
	        }
	        else {
	            DB::select("update cet_logo set imagelogo = '' where id=1");
            return redirect()->route('admin.edit.logo')->with('success','Cập nhật thành công.');
	        }
        }
    }
}
