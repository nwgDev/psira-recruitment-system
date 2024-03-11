<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user() && $this->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'                         => 'required|string',
            'job_description'              => 'required|string',
            'business_unit'                => 'required|in:ICT,Human Capital,Law Enforcement,Finance',
            'manager_name'                 => 'required|string',
            'manager_email'                => 'required|email',
            'required_experience_in_years' => 'required|integer',
            'qualification_id'             => 'required|exists:qualifications,id',
            'drivers_license'              => 'required|boolean',
            'opening_date'                 => 'required|date',
            'closing_date'                 => 'required|date|after:opening_date',
        ];
    }
}
