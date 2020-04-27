<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class ReserveSeatRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required | string',
            'from' => 'required | int | exists:stations,id',
            'to' => 'required | int | exists:stations,id',
            'bus' => 'required | int | exists:buses,id',
            'seat' => 'required | int | exists:buses,id',
        ];
    }

    protected function failedValidation(Validator $validator): JsonResponse
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(['errors' => $errors], JsonResponse::HTTP_BAD_REQUEST)
        );
    }
}
