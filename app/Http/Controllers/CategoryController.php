<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tool;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * 获取列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, $id)
    {
        $categoryName = Category::query()->where('id', $id)->value('name');
        $tools = Tool::query()->orderByDesc('click_count')->where('category_id', $id)->paginate(15);;

        $cate_blog_id = 5;
        $blogs = Tool::query()->where('category_id', $cate_blog_id)->orderByDesc('click_count')->limit(10)->get();

        return view('category.index', compact('categoryName', 'tools', 'blogs'));
    }
}
