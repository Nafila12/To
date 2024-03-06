<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
    // public function rules(): array
    // {
    //     return [
    //         // 'jenis_id' => ['required', 'max:50', 'string'],
    //         // 'nama_menu' => ['required', 'max:50', 'string'],
    //         // 'harga' => ['required', 'max:50', 'string'],
    //         // 'image' => ['required', 'max:50', 'string'],
    //         // 'deskripsi' => ['required', 'string']
    //     ];
    // }
    // public function messages()
    // {
    //     return [
    //         'jenis_id.required' => 'jenis Menu belum diisi!',
    //         'nama_menu.required' => 'nama Menu belum diisi!',
    //         'harga.required' => 'harga Menu belum diisi!',
    //         'image.required' => 'image Menu belum diisi!',
    //         'deskripsi.required' => 'deskripsi Menu belum diisi!',
    //     ];
    // }
}
