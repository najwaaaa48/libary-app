<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize()
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
            'kode_buku' => 'required|max:4',
            'nama_buku' => 'required|min:10|max:40',
            'penerbit_buku' => 'required|min:10|max:40',
            'tahun_terbit' => 'nullable|digits:4',
            'penulis_buku' => 'required|min:10|max:40',
        ];
    }

    public function messages()
    {
        return [
            'kode_buku.required' => 'Kode buku wajib diisi.',
            'kode_buku.max' => 'Kode buku maksimal 4 huruf.',
            'nama_buku.required' => 'Nama buku wajib diisi.',
            'nama_buku.min' => 'Nama buku minimal 10 huruf.',
            'nama_buku.max' => 'Nama buku maksimal 40 huruf.',
            'penerbit_buku.required' => 'Penerbit buku wajib diisi.',
            'penerbit_buku.min' => 'Penerbit buku minimal 10 huruf.',
            'penerbit_buku.max' => 'Penerbit buku maksimal 40 huruf.',
            'tahun_terbit.digits' => 'Tahun terbit maksimal 4 angka.',
            'penulis_buku.required' => 'Penulis buku wajib diisi.',
            'penulis_buku.min' => 'Penulis buku minimal 10 huruf.',
            'penulis_buku.max' => 'Penulis buku maksimal 40 huruf.',
        ];
    }
}
