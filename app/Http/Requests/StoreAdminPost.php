<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminPost extends FormRequest
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
            'username'=>'required|unique:admin|max:12|min:2',
            
        ];
    }
    public function messages(){
        return[
                 'username.required'=>'名字不能为空',
                 'username.unique'=>'名字存在',
                 'username.max'=>'名字长度不能错过12位',
                 'username.min'=>'名字不长度不少于2位',
               
        ];
    }
}
