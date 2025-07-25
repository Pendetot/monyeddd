<?php

namespace App\Http\Requests\Operasional\LapDokumen;

use Illuminate\Foundation\Http\FormRequest;

class StoreLapDokumenRequest extends FormRequest
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
            'nama_dokumen' => 'required|string|max:255',
            'jenis_dokumen' => 'required|string|max:255',
            'tanggal_upload' => 'required|date',
            'file_path' => 'required|string',
        ];
    }
}
