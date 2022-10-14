<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignShiftRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
            "workerShifts" => "required|array",
            "workerShifts.*.shiftId" => "required|exists:shifts,id",
            "workerShifts.*.shiftDay" => "required|date_format:Y-m-d|after_or_equal:today|date"
        ];
    }
}
