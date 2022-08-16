<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:191',
            'email' => 'required|email|unique:users|string|max:191',
            'password' => 'required|min:8|regex:/\A([a-zA-Z0-9]{8,})+\z/u|max:191'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前は入力必須です',
            'name.max' => '名前は191文字以内で入力してください',
            'email.required' => 'メールアドレスは入力必須です',
            'email.unique' => 'そのメールアドレスは既に登録されています',
            'email.email' => 'メールアドレスの形式で入力してください',
            'email.max' => 'メールアドレスは191文字以内で入力してください',
            'password.required' => 'パスワードは入力必須です',
            'password.regex' => 'パスワードは英数字で入力してください',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.max' => 'パスワードは191文字以内で入力してください'
        ];
    }
}
