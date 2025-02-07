<?php

namespace App\Http\Requests\Setings\ChangePassword;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'password1' => 'required|string|max:15',
            'password' => 'required|string|max:15',

        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле не заполненно',
            'string'=>'тип данных не тот',
            'max' => 'Максимально 15 символов',
        ];
    }
}
