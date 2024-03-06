<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorepelangganRequest extends FormRequest
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
            'nama' => ['required', 'max:50', 'string'],
            'email' => ['required', 'max:50', 'string'],
            'nomor_telepon' => ['required', 'max:50', 'string'],
            'alamat' => ['required', 'max:50', 'string'],
        ];
    }

    
   public function massages(): array
   {
       return [
           'nama.required' => 'Data nama pelanggan belum di isi!',
           'email.required' => 'Data nama pelanggan belum di isi!',
           'nomor_telepon.required' => 'Data nama pelanggan belum di isi!',
           'alamat.required' => 'Data nama pelanggan belum di isi!',

   
          ];
        }
}
