<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id'                   => 'exists:users,id',
            'qualification_id'          => 'exists:qualifications,id',
            'drivers_license'           => 'in:Yes,No',
            'current_position'          => 'string',
            'company_name'              => 'string',
            'number_year_employed'      => 'integer',
            'current_annual_salary_ctc' => 'string',
            'previous_position'         => 'nullable|string',
            'previous_company'          => 'nullable|string',
            'period_from'               => 'nullable|date',
            'period_to'                 => 'nullable|date',
        ];
    }
}
