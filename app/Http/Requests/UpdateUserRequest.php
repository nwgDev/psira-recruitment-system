<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->route('user')->id;

        return [
            'name'          => 'required|string|max:255',
            'username'      => [
                                'required', 'string', 'max:255',
                                Rule::unique('users')->ignore($userId)
            ],
            'surname'       => 'required|string|max:255',
            'id_number'     => [
                                'required', 'string', 'max:255',
                                Rule::unique('users')->ignore($userId)
            ],
            'cell_number'   => 'required|string|max:255',
            'work_number'   => 'nullable|string|max:255',
            'email'         => [
                                'required', 'string', 'email', 'max:255',
                                Rule::unique('users')->ignore($userId)
            ],
            'home_address'  => 'required|string',
            'province_id'   => 'required|exists:provinces,id',
            'code'          => 'required|string|max:255',
            'password'      => 'nullable|string|min:8',
            'cv_link'       => 'required|file|mimes:pdf,doc,docx|max:2048',
        ];
    }
}
