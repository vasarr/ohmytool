<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function root(Request $request)
    {
        // API 文档
        $cate_api_doc_id = 2;
        $cate_blog_id = 5;
        $cate_tool_id = 8;
        $cate_english_id = 6;
        $cate_software_id = 9;

        $apiDocs = Tool::query()->where('category_id', $cate_api_doc_id)->orderByDesc('click_count')->limit(10)->get();
        $blogs = Tool::query()->where('category_id', $cate_blog_id)->orderByDesc('click_count')->limit(10)->get();
        $tools = Tool::query()->where('category_id', $cate_tool_id)->orderByDesc('click_count')->limit(10)->get();
        $englishs = Tool::query()->where('category_id', $cate_english_id)->orderByDesc('click_count')->limit(10)->get();
        $softwares = Tool::query()->where('category_id', $cate_software_id)->orderByDesc('click_count')->limit(10)->get();


        return view("page.index", compact('apiDocs', 'blogs', 'tools', 'englishs', 'softwares'));
    }


    public function clickCount(Request $request)
    {
        if ($request->ajax())
        {
            $id = $request->input('id', 0);
            if (!empty($id)) {
                Tool::query()->where('id', $id)->increment('click_count', 1);
            }
        }
    }
}
