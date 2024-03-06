<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorejenisRequest extends FormRequest
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
            // 'kategory_id' => ['required', 'max:50', 'string'],
            'nama_jenis' => ['required', 'max:50', 'string'],
        ];
    }
    public function messages()
    {
        return [
            // 'kategory_id.required' => 'Data Kategory belum diisi!',
            'nama_jenis.required' => 'nama jenis belum diisi!'
        ];
    }
}
