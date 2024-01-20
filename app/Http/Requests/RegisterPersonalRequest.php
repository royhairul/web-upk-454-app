<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;

class RegisterPersonalRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => 422,
                'msg' => 'Validasi data personal gagal!',
                'errors'=> $validator->errors(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nim' => ['required', 'numeric'],
            'nama' => ['required', 'string', 'regex:/^[^\d]+$/' ],
            'kelas' => 'required|regex:/^[1-6][A-Z]$/',
            'prodi' => 'required',
            'phone' => ['required', 'digits:12', 'numeric', 'regex:/^(\+62|62|0)8[1-9][0-9]{6,9}$/'],
            'email' => 'required|email',
        ];
    }

    public function messages(): array
    {
        return [
            'numeric' => 'Field :attribute harus angka.',
            'required' => 'Field :attribute harus diisi.',
            'email' => 'Field :attribute anda tidak yang valid.',
            'nama.regex' => 'Field :attribute harus huruf.',
            "phone.regex" => "Format :attribute harus dimulai dari '+62' atau '0'.",
            'phone.digits' => 'Field :attribute harus 12 digit',
            'kelas.regex' => "Format :attribute tidak valid.",
        ];
    }

    public function attributes(): array
    {
        return [
            'nim' => 'NIM'
        ];
    }
}
