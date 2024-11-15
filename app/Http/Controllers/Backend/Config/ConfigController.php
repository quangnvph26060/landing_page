<?php

namespace App\Http\Controllers\Backend\Config;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index()
    {
        $title = 'Cấu hình trang web';
        return view('backend.config.index', compact('title'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
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
}
