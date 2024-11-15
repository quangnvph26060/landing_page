<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\{
    Session_2,
    Session_3,
    Session_4,
    Session_5,
    Session_6
};

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'session_1' =>  DB::table('sgo_session_1')->first(),
            'session_2' =>  Session_2::first(),
            'session_3' =>  Session_3::first(),
            'session_4' =>  Session_4::first(),
            'session_5' =>  Session_5::latest()->get(),
            'session_6' =>  Session_6::first(),
        ];


        return view('frontend.layouts.master', compact('data'));
    }
}
