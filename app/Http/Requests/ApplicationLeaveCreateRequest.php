<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ApplicationLeaveCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'leave_type_id' => 'required',
            'employee_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'count' => 'required',
            'string' => 'required',
            'is_approve' => 'required',
            'attachment_path' => 'required',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
