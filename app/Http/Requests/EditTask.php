<?php

namespace App\Http\Requests;

use App\Task;
use Illuminate\Validation\Rule;

class EditTask extends CreateTask
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //認証されているユーザーが指定されているソースを更新する権限を持っているかを確認する。
    //持っていなければ403errorを返す。
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule = parent::rules();

        // Rule::inフィールドが指定したリストの中に値が含まれていることをバリデートする。
        // 'status' => 'required|in(1,2,3)',
        //　親クラスのCreatTaskのrulesメソッドの結果と合体したルールリストを返す。
        $status_rule = Rule::in(array_keys(Task::STATUS));
        return $rule + [
            'status' => 'required|' . $status_rule,
        ];
    }

    public function attributes()
    {
        //親クラスCreateTaskのattributesメソッドの結果と合体した属性名リストを返却する。
        $attributes = parent::attributes();

        return $attributes + [
            'status' => '状態',
        ];
    }

    public function messages()
    {
        $messages = parent::messages();

        $status_labels = array_map(function($item)
        {
            return $item['label'];
        }, Task::STATUS);

        $status_labels = implode('、', $status_labels);

        return $messages + [
            'status.in' => ':attributeには' . $status_labels. 'のいずれかを指定してください。',
        ];
    }
}