<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopCreateRequest extends FormRequest
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
            'shop' => 'required|string|max:191',
            'content' => 'required',
            'img' => 'required',
            'area_id' => 'required|integer',
            'genre_id' => 'required|integer',
            'representative_id' => 'nullable|integer'
        ];
    }

    public function messages()
    {
        return [
            'shop.required' => '店舗名は入力必須です',
            'shop.max' => '店舗名は191文字以内で入力してください',
            'content.required' => 'お店の説明文は入力必須です',
            'img.required' => '店舗画像は入力必須です',
            'area_id.required' => 'エリアIDは入力必須です',
            'area_id.integer' => 'エリアIDは数字で入力してください',
            'genre_id.required' => 'ジャンルIDは入力必須です',
            'genre_id.integer' => 'ジャンルIDは数字で入力してください',
            'representative_id.integer' => '店舗代表者は数字で入力してください'
        ];
    }
}
