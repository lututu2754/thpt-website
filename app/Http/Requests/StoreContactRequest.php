<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => ['nullable', 'string', 'regex:/^(0[3|5|7|8|9])([0-9]{8})$/'],
            'message' => 'required|string|min:10|max:2000',
        ];
    }
    public function messages(): array
    {
        return ['phone.regex' => 'Số điện thoại không đúng định dạng (10 số).'];
    }
}
