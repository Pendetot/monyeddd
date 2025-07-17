<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePelamarRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:pelamars,email,' . $this->pelamar->id,
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'status_aplikasi' => 'nullable|string',
            'tanggal_interview' => 'nullable|date',
            'catatan_hrd' => 'nullable|string',
        ];
    }
}