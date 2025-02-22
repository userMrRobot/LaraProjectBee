<?php

namespace App\Http\Requests\Obmen\GoldOnRub;

use Illuminate\Foundation\Http\FormRequest;

class ObmenGoldOnRubRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'moneyObmen' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле не заполненно',
            'numeric' => 'Тип данных не тот',
        ];
    }
}
