<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('q');
        $tools = Tool::query()->where('title', 'like', "%{$search}%")->orderByDesc('click_count')->paginate();

        return view('search.index', [
            'tools' => $tools,
            'filters'  => [
                'q' => $search,
            ],
            'category' => null,
        ]);

    }

    public function index1(Request $request)
    {
//        dd($request->get('q'));
        $q = $request->input('q');
        $page = $request->input('page', 1);
        $perPage = 16;

        // 构建查询
        $params = [
            'index' => 'tools',
            'type'  => '_doc',
            'body'  => [
                'from'  => ($page - 1) * $perPage, // 通过当前页数与每页数量计算偏移值
                'size'  => $perPage,
                'query' => [
                    'bool' => [
                        'filter' => [
                            ['term' => ['is_show' => true]],
                        ],
                    ],
                ],
                'sort' => [
                    'click_count' => 'desc',
                ],
            ],
        ];

        if ($search = $request->input('q', '')) {
            $params['body']['query']['bool']['must'] = [
                [
                    'multi_match' => [
                        'query'  => $search,
                        'fields' => [
                            'title^2',
                            'description',
                        ],
                    ],
                ]
            ];
        }


        $result = app('es')->search($params);
        // 通过 collect 函数将返回结果转为集合，并通过集合的 pluck 方法取到返回的商品 ID 数组
        $toolIds = collect($result['hits']['hits'])->pluck('_id')->all();
        // 通过 whereIn 方法从数据库中读取商品数据
        $tools = Tool::query()
            ->whereIn('id', $toolIds)
            ->get();

        // 返回一个 LengthAwarePaginator 对象
        $pager = new LengthAwarePaginator($tools, $result['hits']['total'], $perPage, $page, [
            'path' => route('search.index', false), // 手动构建分页的 url
        ]);

//        dd($tools);

        return view('search.index', [
            'tools' => $pager,
            'filters'  => [
                'q' => $search,
            ],
            'category' => null,
        ]);
    }
}
