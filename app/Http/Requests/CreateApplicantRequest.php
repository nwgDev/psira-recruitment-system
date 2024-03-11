<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateApplicantRequest extends FormRequest
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
            'user_id'                   => 'required|exists:users,id',
            'post_id'                   => 'required|exists:posts,id',
            'qualification_id'          => 'required|exists:qualifications,id',
            'drivers_license'           => 'required|in:Yes,No',
            'current_position'          => 'required|string',
            'company_name'              => 'required|string',
            'number_year_employed'      => 'required|integer',
            'current_annual_salary_ctc' => 'required|string',
            'previous_position'         => 'nullable|string',
            'previous_company'          => 'nullable|string',
            'period_from'               => 'nullable|date',
            'period_to'                 => 'nullable|date|after:period_from',
            'total_experience_in_years' => 'required|integer',
        ];
    }
}
