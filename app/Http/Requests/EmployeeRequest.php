<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'employee_id'       => 'required|alpha_num|min:6|max:10',
            'employee_name'     => 'required|min:6|max:15|alpha',
            'phone_number'      => 'required|numeric',
            'employee_email'    => 'required|email',
            'gender'            => 'required',
            'date_of_birth'     => 'required',
            'department'        => 'required',
            'employee_address'  => 'required|max:100',
            'empolyee_image'    => 'required|image|mimes:jpg,png,gif|max:2048'
           
        ];
    }
}
