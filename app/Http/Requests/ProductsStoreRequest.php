<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsStoreRequest extends FormRequest
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
            'file' => 'required|file|mimes:xls,xlsx|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Pole :attribute jest wymagane.',
            'file' => 'Pole :attribute musi być plikiem',
            'mimes' => 'Plik musi być w formacie xls, xlsx',
            'max' => 'Plik nie moze być większy niż 2Mb',
        ];
    }

    public function attributes()
    {
        return [
            'file' => 'Importu',
        ];
    }
}
