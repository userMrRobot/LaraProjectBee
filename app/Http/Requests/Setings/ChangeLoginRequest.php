<?php

namespace App\Http\Requests\Setings;

use Illuminate\Foundation\Http\FormRequest;

class ChangeLoginRequest extends FormRequest
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
            'name' => 'required|string|max:15',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute не заполненно',
            'string'=>'тип данных не тот',
            'max' => 'Максимально 15 символов',
        ];
    }
}
