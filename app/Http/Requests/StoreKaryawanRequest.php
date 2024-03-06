<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKaryawanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nip' => 'required', 
            'nik' => 'required',
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function massages(): array
    {
        return [
            'nip.required' => 'Data nip belum di isi!',
            'nik.required' => 'Data nama pelanggan belum di isi!',
            'nama.required' => 'Data nama pelanggan belum di isi!',
            'jenis_kelamin.required' => 'Data nama pelanggan belum di isi!',
            'tempat_lahir.required' => 'Data nama pelanggan belum di isi!',
            'tanggal_lahir.required' => 'Data nama pelanggan belum di isi!',
            'telpon.required' => 'Data nama pelanggan belum di isi!',
            'agama.required' => 'Data nama pelanggan belum di isi!',
            'status_nikah.required' => 'Data nama pelanggan belum di isi!',

            'alamat.required' => 'Data nama pelanggan belum di isi!',
            'foto.required' => 'Data nama pelanggan belum di isi!',

        ];
    }
}
