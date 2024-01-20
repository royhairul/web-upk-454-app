<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;

class RegisterAccountRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => 422,
                'msg' => 'Validasi data akun gagal!',
                'errors'=> $validator->errors(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'required' => 'Field :attribute harus diisi.',
            'confirmed' => 'Field konfirmasi :attribute tidak sama.'
        ];
    }

    public function rules(): array
    {
        return [
            'username' => 'required',
            'password' => ['required', 'confirmed'],
        ];
    }
}
