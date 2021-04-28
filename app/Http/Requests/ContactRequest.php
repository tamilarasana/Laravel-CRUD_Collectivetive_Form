<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        $id = $this->method() == 'PUT' ?  \Request::segment(4) : 'NULL';
        return [
            'first_name'     => 'required|min:3|max:15|regex:/^[a-zA-Z.Ññ\s]+$/',
            'last_name'      => 'required|min:1|max:15|regex:/^[a-zA-ZÑñ\s]+$/',
            'phone_number'   => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:6|max:15',
            'email'          => 'required|email|unique:contact,email,'.$id.',id,deleted_at,NULL',
            'date_of_birth'  => 'required|date',
            'about_me'       => 'required|max:255',
            'status'         => 'required|min:1|max:5|numeric',
           
        ];
    }
}


   
 
   
  
 
       

