<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user() && $this->user()->hasRole('admin');
    }

    public function rules()
    {
        return [
            'name'                          => 'required|string|max:255',
            'job_description'               => 'required|string',
            'business_unit'                 => 'required|string|max:255',
            'manager_name'                  => 'required|string|max:255',
            'manager_email'                 => 'required|email|max:255',
            'required_experience_in_years'  => 'required|integer|min:1',
            'qualification_id'              => 'required|exists:qualifications,id',
            'drivers_license'               => 'required|string|max:255',
            'opening_date'                  => 'required|date',
            'closing_date'                  => 'required|date|after:opening_date',
        ];
    }
}
