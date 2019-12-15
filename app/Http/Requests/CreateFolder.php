<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFolder extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //authorizeメソッドはリクエストの内容に基づいた権限チェックの為に使う
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
            //required Laravelがデフォルトで提供しているたくさんのルールのうちの一つ
            'title' => 'required',
        ];
    }
}