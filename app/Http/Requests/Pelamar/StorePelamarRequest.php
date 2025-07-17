<?php

namespace App\Http\Requests\Pelamar;

use Illuminate\Foundation\Http\FormRequest;

class StorePelamarRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pelamar,email',
            'telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
        ];
    }
}
