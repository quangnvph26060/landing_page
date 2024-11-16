<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\{
    Contact,
    Session_2,
    Session_3,
    Session_4,
    Session_5,
    Session_6,
    Session_7,
    Session_8,
    Session_9
};
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

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
            'session_7' =>  DB::table('sgo_session_7')->get(),
            'session_8' =>  Session_8::latest()->get(),
            'session_9' =>  Session_9::latest()->get(),
            'session_10' =>  DB::table('sgo_session_10')->first(),
        ];


        return view('frontend.layouts.master', compact('data'));
    }

    public function contact(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'nullable',
                'phone' => ['required', 'regex:/^0[0-9]{9}$/'],
                'note' => 'nullable',

            ],
            __('request.messages'),
            [
                'phone' => 'Số điện thoại',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first()]);
        }

         // Kiểm tra nếu số điện thoại đã gửi liên hệ trong vòng 5 phút trước
        $recentContact = Contact::where('phone', $validator->validated()['phone'])
            ->where('created_at', '>=', Carbon::now()->subMinutes(5))
            ->first();

        if ($recentContact) {

            return response()->json([
                'status' => false,
                'message' => 'Bạn đã gửi liên hệ trong vòng 5 phút trước. Vui lòng chờ thêm.',
            ]);
        }

        Contact::updateOrCreate(
            ['phone' => $validator->validated()['phone']],
            [
                'name' => $validator->validated()['name'] ?? null,
                'note' => $validator->validated()['note'] ?? null,
                'created_at' => Carbon::now(),
            ]
        );


        return response()->json(['status' => true, 'message' => 'Đăng ký thành công.']);
    }
}
