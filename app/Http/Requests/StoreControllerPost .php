<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentPost extends FormRequest
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
            'cname'=>'unique:student|regex:/^[\x{4e00}-\x{9fa5}A-Za-z-9_-]{2,12}$/u',
            //'cname'=>'required|unique:student|max:12|min:2',
           'grade'=>'required|numeric|between:0,100'
        ];
    }
    public function messages(){
        return[
                  'cname.required'=>'名字不能为空',
             'cname.unique'=>'名字存在',
             'cname.regex'=>'必须是中文,字母,下划线,数字组成且2,12位',
            'grade.required'=>'成绩必填',
            'grade.numeric'=>'必须是数字',
            'grade.between'=>'不能超过100',
                
        ];
    }
}
