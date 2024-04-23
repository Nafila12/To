<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreabsenRequest extends FormRequest
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
        
            'nama_karyawan' => ['required', 'max:50', 'string'],
            'tanggal_masuk' => ['required'],
            'waktu_masuk' => ['required'],
            'status' => ['required'],
            'waktu_keluar' => ['required'],
        
        ];
    }

    public function massages(): array
    {
        return [
           
            'nama_karyawan.required' => 'Data nama karyawan belum di isi!',
            'tanggal_masuk.required' => 'Data tanggal masuk belum di isi!',
            'waktu_masuk.required' => 'Data Waktu masuk belum di isi!',
            'status.required' => 'Data status belum di isi!',
            'waktu_keluar.required' => 'Data waktu keluar belum di isi!',
            
        ];
    }
}
