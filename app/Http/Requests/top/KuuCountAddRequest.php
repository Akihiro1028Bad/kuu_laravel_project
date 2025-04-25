<?php

namespace App\Http\Requests\Top;

use Illuminate\Foundation\Http\FormRequest;

class KuuCountAddRequest extends FormRequest
{
    /**
     * このリクエストを許可するかどうかを判断します。
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // 必要に応じて認可ロジックを調整してください
    }

    /**
     * リクエストに適用されるバリデーションルールを取得します。
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => ['required', 'integer', 'exists:user_kuu_statuses,user_id'],
        ];
    }

    /**
     * バリデーションエラーのカスタムメッセージを取得します。
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user_id.required' => 'user_idフィールドは必須です。',
            'user_id.integer' => 'user_idは整数でなければなりません。',
            'user_id.exists' => '指定されたuser_idは存在しません。',
        ];
    }
}
