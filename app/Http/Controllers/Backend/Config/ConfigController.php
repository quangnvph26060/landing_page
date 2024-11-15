<?php

namespace App\Http\Controllers\Backend\Config;

use App\Models\Config;
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

use function Symfony\Component\String\b;

class ConfigController extends Controller
{
    public function index()
    {
        $title = 'Cấu hình trang web';
        return view('backend.config.index', compact('title'));
    }

    public function store(Request $request)
    {
        $criteria = $request->validate(
            [
                'title' => 'required',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'address' => 'required',
                'phone' => ['required', 'regex:/^0[0-9]{9}$/'],
                'website' => 'required',
                'title_footer' => 'required',
                'content_footer' => 'required',
                'script' => 'nullable',
                'fanpage' => 'nullable',
                'title_seo' => 'required',
                'description_seo' => 'required',
                'keywords_seo' => 'required',
            ],
            __('request.messages'),
            [
                'title' => 'Tiêu đề',
                'logo' => 'Logo',
                'favicon' => 'Favicon',
                'address' => 'Địa chỉ',
                'phone' => 'Số điện thoại',
                'website' => 'Website',
                'title_footer' => 'Tiêu đề footer',
                'content_footer' => 'Nội dung footer',
                'script' => 'Script',
                'fanpage' => 'Fanpage',
                'title_seo' => 'Tiêu đề SEO',
                'description_seo' => 'Mô tả SEO',
                'keywords_seo' => 'Từ khóa SEO',
            ]
        );

        $config = Config::first();

        if ($request->hasFile('logo')) {
            $criteria['logo'] = saveImage($request, 'logo', 'logo');
        }
        if ($request->hasFile('favicon')) {
            $criteria['favicon'] = saveImage($request, 'favicon', 'favicon');
        }

        $config->update($criteria);

        return redirect()->back()->with(['success' => 'Cập nhật thành công']);
    }

    public function configHome(int $session)
    {
        switch ($session) {
            case 1:
                return $this->sessionOne();
            case 2:
                return $this->sessionTwo();
            case 3:
                return $this->sessionThree();
            case 4:
                return $this->sessionFour();
            case 5:
                return $this->sessionFive();
            case 6:
                return $this->sessionSix();
            default:
                abort(404);
        }
    }

    public function postSession(Request $request, int $session)
    {
        switch ($session) {
            case 1:
                return $this->postSessionOne($request);
            case 2:
                return $this->postSessionTwo($request);
            case 3:
                return $this->postSessionThree($request);
            case 4:
                return $this->postSessionFour($request);
            case 5:
                return $this->postSessionFive($request);
            case 6:
                return $this->postSessionSix($request);
            default:
                abort(404);
        }
    }

    public function sessionOne()
    {
        $title = 'Cấu hình session 01';
        $session = DB::table('sgo_session_1')->first();

        return view('backend.config.home.session-01', compact('title', 'session'));
    }

    public function postSessionOne(Request $request)
    {
        $criteria = $request->validate(
            [
                'banners' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            __('request.messages')
        );

        if ($request->hasFile('banners')) {
            $criteria['banners'] = saveImage($request, 'banners', 'banners');
        }

        $session = DB::table('sgo_session_1')->first();

        if (!$session) {
            DB::table('sgo_session_1')->insert($criteria);
        } else {
            DB::table('sgo_session_1')->where('id', $session->id)->update($criteria);
            deleteImage($session->banners);
        }

        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    public function sessionTwo()
    {
        $title = 'Cấu hình session 02';
        $session = Session_2::first();

        return view('backend.config.home.session-02', compact('title', 'session'));
    }

    public function postSessionTwo(Request $request)
    {
        $criteria = $request->validate(
            [
                'title' => 'required',
                'contents' => 'required',
                'contents.*' => 'required',
            ],
            __('request.messages')
        );


        $session = Session_2::first();

        if (!$session) {
            Session_2::create($criteria);
        } else {
            $session->update($criteria);
        }

        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    public function sessionThree()
    {
        $title = 'Cấu hình session 03';
        $session = Session_3::first();

        return view('backend.config.home.session-03', compact('title', 'session'));
    }

    public function postSessionThree(Request $request)
    {
        $criteria = $request->validate(
            [
                'contents' => 'required',
                'contents.*' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'ingredients' => 'required',
            ],
            __('request.messages')
        );

        $session = Session_3::first();

        if ($request->hasFile('image')) {
            $criteria['image'] = saveImage($request, 'image', 'image');
            deleteImage($session->image);
        } else {
            $criteria['image'] = $session->image;
        }

        if (!$session) {
            Session_3::create($criteria);
        } else {
            $session->update($criteria);
        }

        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    public function sessionFour()
    {
        $title = 'Cấu hình session 04';
        $session = Session_4::first();

        return view('backend.config.home.session-04', compact('title', 'session'));
    }

    public function postSessionFour(Request $request)
    {

        $criteria = $request->validate(
            [
                'title' => 'required',
                'contents' => 'required',
                'contents.*' => 'required',
                'product_benefits' => 'required',
                'product_benefits.*' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            __('request.messages')
        );

        $session = Session_4::first();

        if ($request->hasFile('image')) {
            $criteria['image'] = saveImage($request, 'image', 'image');
            deleteImage($session->image);
        } else {
            $criteria['image'] = $session->image;
        }

        if (!$session) {
            Session_4::create($criteria);
        } else {
            $session->update($criteria);
        }

        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    public function sessionFive()
    {
        $title = 'Cấu hình session 05';
        $session = Session_5::latest()->get();

        return view('backend.config.home.session-05', compact('title', 'session'));
    }

    public function postSessionFive(Request $request)
    {
        $criteria = $request->validate(
            [
                'title' => 'required',
                'contents' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            __('request.messages'),
            [
                'title' => 'Tiêu đề',
                'contents' => 'Nội dung',
                'image' => 'Hình ảnh',
            ]
        );

        if ($request->hasFile('image')) {
            $criteria['image'] = saveImage($request, 'image', 'image');
        }


        Session_5::create($criteria);

        return response()->json(['status' => true, 'message' => 'Cập nhật thành công']);
    }

    public function update(Request $request, $id)
    {
        $criteria = $request->validate(
            [
                'title' => 'required',
                'contents' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            __('request.messages'),
            [
                'title' => 'Tiêu đề',
                'contents' => 'Nội dung',
                'image' => 'Hình ảnh',
            ]
        );

        $session = Session_5::find($id);

        if ($request->hasFile('image')) {
            $criteria['image'] = saveImage($request, 'image', 'image');
            deleteImage($session->image);
        }

        $session->update($criteria);

        return response()->json(['status' => true, 'message' => 'Cập nhật thành công']);
    }

    public function destroy($id)
    {
        $session = Session_5::find($id);
        deleteImage($session->image);
        $session->delete();

        return response()->json(['status' => true, 'message' => 'Xóa thành công']);
    }

    public function sessionSix()
    {
        $title = 'Cấu hình session 06';
        $session = Session_6::first();

        return view('backend.config.home.session-06', compact('title', 'session'));
    }

    public function postSessionSix(Request $request)
    {
        $criteria = $request->validate(
            [
                'title' => 'required',
                'contents' => 'required',
                'contents.*' => 'required',
                'short_description' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            __('request.messages')
        );

        if ($request->hasFile('image')) {
            $criteria['image'] = saveImage($request, 'image', 'image');
        }

        $session = Session_6::first();

        if (!$session) {
            Session_6::create($criteria);
        } else {
            $session->update($criteria);
        }

        return redirect()->back()->with('success', 'Cập nhật thành công');
    }
}
