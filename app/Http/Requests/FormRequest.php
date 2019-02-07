<?php
/**
 * Created by PhpStorm.
 * User: vasar
 * Date: 2019-02-07
 * Time: 09:41
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as HttpFormRequest;

class FormRequest extends HttpFormRequest
{
    public function authorize()
    {
        return true;
    }
}
