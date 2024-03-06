<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorepemesananRequest extends FormRequest
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
            'meja_id' => ['required', 'max:50', 'string'],
            'tanggal_pemesanan' => ['required', 'max:50', 'string'],
            'jam_mulai' => 'required', 
            'jam_selesai' => 'required', 
            'nama_pemesanan' => ['required', 'max:50', 'string'],
            'jumlah_pelanggan' => ['required', 'max:50', 'string'],
        ];
    }

    public function massages(): array
    {
        return [
            'meja_id.required' => 'Data nama pelanggan belum di isi!',
            'tanggal_pemesanan.required' => 'Data nama pelanggan belum di isi!',
            'jam_mulai.required' => 'Data nama pelanggan belum di isi!',
            'jam_selesai.required' => 'Data nama pelanggan belum di isi!',
            'nama_pemesanan.required' => 'Data nama pelanggan belum di isi!',
            'jumlah_pelanggan.required' => 'Data nama pelanggan belum di isi!',
 
    
           ];
         }
}
