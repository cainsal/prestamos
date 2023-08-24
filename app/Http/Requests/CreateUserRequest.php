<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name'  => 'required',
            'email' => 'required|unique:users|email',
            'dni'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'El nombre es obligatorio',
            'email.required' => 'El correo es obligatorio',
            'email.email'    => 'Por favor use un formato de correo valido',
            'email.unique'   => 'El correo ya se encuentra en registrado',
            'dni.required'   => 'El DNI es obligatorio',
        ];
    }
}
