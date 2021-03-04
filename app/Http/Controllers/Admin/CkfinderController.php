<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CkfinderController extends Controller
{
    public function connector() {
        require_once public_path("css/ckeditor/ckfinder/core/connector/php/connector.php");
    }

    public function ckfinder_view() {
        return view('admin.ckfinder.ckfinder');
    }
}
