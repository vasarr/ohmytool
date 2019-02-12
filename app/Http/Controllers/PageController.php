<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToolRecommendRequest;
use App\Models\Tool;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * 首页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function root(Request $request)
    {
        // API 文档
        $cate_api_doc_id = 2;
        $cate_blog_id = 5;
        $cate_tool_id = 8;
        $cate_english_id = 6;
        $cate_software_id = 9;
        $cate_manual_id = 11;
        $cate_article_id = 12;

        $apiDocs = Tool::query()->where('category_id', $cate_api_doc_id)->where('is_show', true)->orderByDesc('click_count')->limit(15)->get();
        $manuals = Tool::query()->where('category_id', $cate_manual_id)->where('is_show', true)->orderByDesc('click_count')->limit(18)->get();
        $blogs = Tool::query()->where('category_id', $cate_blog_id)->where('is_show', true)->orderByDesc('click_count')->limit(9)->get();
        $tools = Tool::query()->where('category_id', $cate_tool_id)->where('is_show', true)->orderByDesc('click_count')->limit(20)->get();
        $englishs = Tool::query()->where('category_id', $cate_english_id)->where('is_show', true)->orderByDesc('click_count')->limit(32)->get();
        $softwares = Tool::query()->where('category_id', $cate_software_id)->where('is_show', true)->orderByDesc('click_count')->limit(32)->get();
        $articles = Tool::query()->where('category_id', $cate_article_id)->where('is_show', true)->orderByDesc('click_count')->limit(32)->get();


        return view("page.index", compact('apiDocs', 'blogs', 'tools', 'englishs', 'softwares', 'manuals', 'articles'));
    }


    /**
     * 点击数量+1
     * @param Request $request
     */
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

    /**
     * front recommend tools
     * @param Request $request
     */
    public function recommend(Request $request)
    {
        return view('page.recommend');
    }

    /**
     * 添加推荐资源
     * @param Request $request
     */
    public function addTool(ToolRecommendRequest $request, Tool $tool)
    {
        if ($request->ajax()) {
            $tool->fill($request->all());
            $tool->is_show = 0;
            $tool->save();
            return 'ok';
        }
    }

}
