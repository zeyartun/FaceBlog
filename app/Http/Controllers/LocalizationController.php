<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function index($lang)
    {
        Session::put('locale',$lang);
        return back();
    }

    public function sessionDel(Request $request)
    {
        $request->session()->flush();
        return back();
    }
}
