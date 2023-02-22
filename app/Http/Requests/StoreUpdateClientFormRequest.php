<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateClientFormRequest extends FormRequest
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
        $id = $this->segment(2);

        return [
            'name' => "required|min:3|max:60",
            'email' => "required|email|unique:clients,email,$id",
            'phone' => "nullable|min:3|max:60",
            'address' => "nullable|min:3|max:60",
            'obs' => 'max:2000',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'min' => 'O campo :attribute deve possuir no mínimo :min caracteres.',
            'max' => 'O campo :attribute deve possuir no máximo :min caracteres.',
            'email.email' => 'Informe um e-mail válido.',
            'email.unique' => 'Este e-mail já foi utilizado.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'email' => 'e-mail',
            'phone' => 'telefone',
            'address' => 'endereço',
            'obs' => 'observação',
        ];
    }
}
