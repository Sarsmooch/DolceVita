<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreContactMessageRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'contactName' => 'required|max:64',
            'contactEmail' => 'required|max:128|email',
            'contactPhone' => 'required|between:10,11',
            'contactMessage' => 'required|max:512'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {   
        return [
            'contactName' => 'nome',
            'contactEmail' => 'email',
            'contactPhone' => 'telefone',
            'contactMessage' => 'mensagem'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'required' => 'O preenchimento do campo ":attribute" é obrigatório.',
            'between' => 'O campo ":attribute" deve conter obrigatoriamente entre :min e :max caracteres.',
            'max' => 'O campo ":attribute" deve conter no máximo :max caracteres.',
            'email' => 'O campo ":attribute" deve conter um email válido.'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'toast' => view('components.toast', [
                'type' => 'error',
                'messages' => $validator->errors()->messages()
            ])->render(),
        ], 422);
    
        throw new HttpResponseException($response);
    }

}
