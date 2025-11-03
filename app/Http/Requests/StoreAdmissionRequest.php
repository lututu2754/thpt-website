<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdmissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'student_name' => 'required|string|max:255',
            'student_dob'  => 'required|date_format:d/m/Y|before_or_equal:today',
            'address'      => 'required|string|min:10|max:1000',
            'parent_name'  => 'required|string|max:255',
            'parent_phone' => ['required', 'string', 'regex:/^(0[3|5|7|8|9])([0-9]{8})$/'],
        ];
    }
    public function messages(): array
    {
        return ['parent_phone.regex' => 'Số điện thoại không đúng định dạng (10 số).'];
    }
}
