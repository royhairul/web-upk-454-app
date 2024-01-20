<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Override;

class PeminjamanRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => 422,
                'msg' => 'Gagal mengajukan peminjaman!',
                'errors'=> $validator->errors(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages() {
        return [
            'required' => 'Field :attribute harus diisi.',
            'waktu_mulai.required' => 'Field :attribute dan Waktu Selesai harus diisi.',
            'waktu_selesai.required' => 'Field Waktu Mulai dan :attribute harus diisi.',
            'after' => 'Field :attribute harus setelah dari :date.',
        ];
    }

    public function rules(): array
    {
        return [
            'pjmk' => 'required',
            'ruangkelas' => 'required',
            'tanggal' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => ['required', 'after:waktu_mulai'],
            'matakuliah' => 'required',
            'fasilitas' => 'required',

        ];
    }

    public function attributes(): array
    {
        return [
            'pjmk' => 'PJMK',
            'ruangkelas' => 'Ruang Kelas',
            'tanggal' => 'Tanggal Peminjaman',
            'waktu_mulai' => 'Waktu Mulai',
            'waktu_selesai' => 'Waktu Selesai',
            'matakuliah' => 'Mata Kuliah',
            'fasilitas' => 'Fasilitas',
        ];
    }
}
