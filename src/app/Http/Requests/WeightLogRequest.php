<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeightLogRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'password' => 'required|string|max:255',
            'target_weight' => 'required|regex:/^\d{1,3}(\.\d)?$/',
            'date' => 'required',
            'weight' => 'required|numeric|regex:/^\d{1,3}(\.\d)?$/',
            'calories' => 'required|integer',
            'exercise_time' => 'required|time',
            'exercise_content' => 'nullable|string|max:120',
        ];
    }

    
        public function messages()
    {
        return [
            //user
            'name.required' => 'お名前を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'password.required' => 'パスワードを入力してください',

            //weight_target
            'target_weight.required'  => '目標の体重を入力してください',
            'target_weight.regex' => '4桁までの数字で入力してください<br>小数点は1桁で入力してください',
            
            //weight_logs
            'date.required' => '日付を入力してください',
            'weight.required' => '体重を入力してください',
            'weight.numeric' => '数字で入力してください',
            'weight.regex' =>  [
                '4桁までの数字で入力してください',
                '小数点は1桁で入力してください',
                 ],
            'calories.required' => '摂取カロリーを入力してください',
            'calories.integer' => '数字で入力してください',
            'exercise_time.required' => '運動時間を入力してください',
            'exercise_content.max:120' => '120文字以内で入力してください',
        ];
    }
}
