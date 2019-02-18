<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
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
        $cate_book_id = 17;

        $apiDocs = Tool::query()->where('category_id', $cate_api_doc_id)
            ->where('is_show', true)
            ->where('is_recommend', true)
            ->orderByDesc('click_count')
            ->limit(12)->get();
//        $manuals = Tool::query()->where('category_id', $cate_manual_id)
//            ->where('is_show', true)
//            ->orderByDesc('click_count')
//            ->limit(18)->get();
        $blogs = Tool::query()
            ->where('category_id', $cate_blog_id)
            ->where('is_show', true)
            ->where('is_recommend', true)
            ->orderByDesc('click_count')
            ->limit(7)->get();
        $tools = Tool::query()
            ->where('category_id', $cate_tool_id)
            ->where('is_show', true)
            ->where('is_recommend', true)
            ->orderByDesc('click_count')
            ->limit(16)->get();
        $englishs = Tool::query()
            ->where('category_id', $cate_english_id)
            ->where('is_show', true)
            ->where('is_recommend', true)
            ->orderByDesc('click_count')
            ->limit(12)->get();
        $softwares = Tool::query()
            ->where('category_id', $cate_software_id)
            ->where('is_show', true)
            ->where('is_recommend', true)
            ->orderByDesc('click_count')
            ->limit(12)->get();
        $articles = Tool::query()
            ->where('category_id', $cate_article_id)
            ->where('is_show', true)
            ->where('is_recommend', true)
            ->orderByDesc('click_count')
            ->limit(12)->get();
        $books = Tool::query()
            ->where('category_id', $cate_book_id)
            ->where('is_show', true)
            ->where('is_recommend', true)
            ->orderByDesc('click_count')
            ->limit(9)->get();

        return view("page.index", compact('apiDocs', 'blogs', 'tools', 'englishs', 'softwares', 'manuals', 'articles', 'books'));
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

    /**
     * simplemde upload image files
     *
     * @param Request $request
     * @param ImageUploadHandler $handler
     */
    public function mdUploadIamge(Request $request, ImageUploadHandler $handler)
    {

        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'url' => ''
        ];

        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->image) {
            // 保存图片到本地
            $result = $handler->save($request->image, 'mdimages', 'md', 1024);
            // 图片保存成功的话
            if ($result) {
                $data['image'] = $result['path'];
                $data['msg']       = "上传成功!";
                $data['success']   = true;
            }
        }
        return $data;
    }
}
