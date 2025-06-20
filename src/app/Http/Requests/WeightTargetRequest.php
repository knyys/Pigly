<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeightTargetRequest extends FormRequest
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
        $routeName = $this->route()->getName(); // 例: 'goal.setting'

        if ($routeName === 'goal.setting') {
            return [
                'target_weight' => 'required|regex:/^\d{1,3}(\.\d)?$/',
            ];
        }elseif ($routeName === 'register.step2.post') {
            return [
                'target_weight' => 'required|regex:/^\d{1,3}(\.\d)?$/',
                'weight' => 'required|numeric|regex:/^\d{1,3}(\.\d)?$/',
            ];
        }
    }
    
        public function messages()
    {
        return [
            'target_weight.required'  => '目標の体重を入力してください',
            'target_weight.regex' => '4桁までの数字で入力してください<br>小数点は1桁で入力してください',
            'weight.required' => '体重を入力してください',
            'weight.numeric' => '数字で入力してください',
            'weight.regex' => '4桁までの数字で入力してください。小数点は1桁までです。',
        ];
    }
}
