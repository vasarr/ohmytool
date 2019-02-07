<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class ToolRecommendRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => ['required',
                    Rule::in([2, 5, 8, 12, 6, 9]),
//                    Rule::in([77]),
                ],
            'title' => 'required|min:2|max:20',
            'url' => 'required|url',
            'description' => 'required|min:5|max:100',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => '请选择分类',
            'category_id.in' => '错误的分类',
            'title.required'  => '请填写标题',
            'title.min'  => '标题在2-10个字内',
            'title.max'  => '标题在2-10个字内',
            'url.required'  => '请填写url地址',
            'url.url'  => '请填写正确的url地址',
            'description.required'  => '请填写简要描述',
            'description.min'  => '简要描述标题在5-30个字内',
            'description.max'  => '简要描述标题在5-30个字内',
        ];
    }
}
