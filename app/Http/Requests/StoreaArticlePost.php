<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticelPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'tname'=>'unique:student|regex:/^[\x{4e00}-\x{9fa5}A-Za-z-9_-]{2,12}$/u',
            'tname'=>'required|unique:article',
        ];
    }
    public function messages(){
        return[
             'tname.required'=>'商品名称不能为空',
                'tname.unique'=>'商品存在',
                //'tname.regex'=>'商品是中文,字母,下划线,数字组成',
                
        ];
    }
}
