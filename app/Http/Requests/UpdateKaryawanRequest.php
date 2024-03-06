<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;     

class UpdateKaryawanRequest extends FormRequest
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
            'nip' => ['required', 'max:50', 'string'],
            'nik' => ['required', 'min:16', 'integer'],
            'nama' => ['required', 'max:50', 'string'],
            'jenis_kelamin' => ['required', 'max:50', 'string'],
            'tempat_lahir' => ['required', 'max:50', 'string'],
            'tanggal_lahir' => 'required',
            'telpon' => 'required',
            'agama' => ['required', 'max:50', 'string'],
            'status_nikah' => ['required', 'max:50', 'string'],
            'alamat' => ['required', 'max:50', 'string'],
            'foto' => ['required', 'max:50', 'string'],
        ];
    }
}
