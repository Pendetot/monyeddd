<?php

namespace App\Http\Requests\Operasional\KPI;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKPIRequest extends FormRequest
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
            'karyawan_id' => 'sometimes|required|exists:karyawans,id',
            'bulan' => 'sometimes|required|date_format:Y-m',
            'target' => 'sometimes|required|numeric|min:0',
            'realisasi' => 'sometimes|required|numeric|min:0',
        ];
    }
}
