<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'username'      => 'required|string|max:255|unique:users',
            'id_number'     => 'required|string|max:255|unique:users',
            'password'      => 'required|string|min:8',
            'name'          => 'required|string|max:255',
            'surname'       => 'required|string|max:255',
            'cell_number'   => 'required|string|max:255',
            'work_number'   => 'nullable|string|max:255',
            'email'         => [
                                'required',
                                'string',
                                'email',
                                'max:255',
                                'unique:users,email,' . $this->username . ',username',
            ],
            'home_address'  => 'required|string',
            'province_id'   => 'required|exists:provinces,id',
            'code'          => 'required|string|max:255',
            'cv_link'       => 'required|file|mimes:pdf,doc,docx|max:2048',
        ];
    }

    protected function prepareForValidation()
    {
        if (!$this->has('email') && $this->has('username')) {
            $this->merge(['email' => $this->input('username')]);
        }
    }
}
