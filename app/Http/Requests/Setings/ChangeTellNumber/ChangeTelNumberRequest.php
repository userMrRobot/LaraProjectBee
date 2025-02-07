<?php

namespace App\Http\Requests\Setings\ChangeTellNumber;

use Illuminate\Foundation\Http\FormRequest;

class ChangeTelNumberRequest extends FormRequest
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
            'telephone_number' => 'required|string|unique:users|min:11|max:11',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле не заполненно',
            'string'=>'Тип данных не тот',
            'unique'=> 'Введите другой номер',
            'min' => 'Не коректный номер',
            'max' => 'Максимально 11 символов',
        ];
    }
}
