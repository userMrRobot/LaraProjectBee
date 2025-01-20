<?php

namespace App\Http\Requests\Setings;

use Illuminate\Foundation\Http\FormRequest;

class ChangeEmailRequest extends FormRequest
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
            'email' => 'required|string|unique:users|max:30',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute не заполненно',
            'string'=>'Тип данных не тот',
            'unique'=> 'Выберите другой email',
            'max' => 'Максимально 30 символов',
        ];
    }
}
