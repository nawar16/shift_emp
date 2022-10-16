<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorkerRequest extends FormRequest
{
    /**
     * Determine if the worker is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'phone' => 'required|numeric|unique:workers|digits:10',
            'email' => 'required|unique:workers|email',
            'timezoneId' => 'required|exists:timezone,id'
        ];
    }
}
