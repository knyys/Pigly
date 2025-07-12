<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreWeightLogRequest extends FormRequest
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
        $routeName = $this->route()->getName(); 

        if ($routeName === 'register.step2.post') {
            return [
                'target_weight' => 'required|regex:/^\d{1,3}(\.\d)?$/',
                'weight' => 'required|numeric|regex:/^\d{1,3}(\.\d)?$/',
            ];
        }else {
            return [
                'date' => 'required',
                'weight' => 'required|numeric|regex:/^\d{1,3}(\.\d)?$/',
                'calories' => 'required|integer',
                'exercise_time' => 'required|date_format:H:i:s',
                'exercise_content' => 'nullable|string|max:120',
            ];
        }
        
    }
    
        public function messages()
    {
        return [
            'date.required' => '日付を入力してください',
            'weight.required' => '体重を入力してください',
            'weight.numeric' => '数字で入力してください',
            'weight.regex' => '4桁までの数字で入力してください。小数点は1桁までです。',
            'calories.required' => '摂取カロリーを入力してください',
            'calories.integer' => '数字で入力してください',
            'exercise_time.required' => '運動時間を入力してください',
            'exercise_time.date_format' => '運動時間はHH:MM:SSの形式で入力してください',
            'exercise_content.max' => '120文字以内で入力してください',
            'target_weight.required'  => '目標の体重を入力してください',
            'target_weight.regex' => '4桁までの数字で入力してください<br>小数点は1桁で入力してください',
        ];
    }
}
