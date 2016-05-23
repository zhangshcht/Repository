<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'nickname'=>'required|regex:/\w{3,12}/',
            'email'=>'required|email',
            'password'=>'required|regex:/\S{8,18}/',
            'repassword'=>'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'nickname.required'=>'用户名必填',
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱格式不正确',
            'password.required'=>'密码不能为空',
            'password.regex'=>'请输入8~18位非空白字符',
            'repassword.required'=>'确认密码不能为空',
            'repassword.same'=>'两次密码不一致'
        ];
    }
}
