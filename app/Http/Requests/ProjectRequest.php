<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
        $segment = \Request::segment(4) ? \Request::segment(4) : \Request::segment(2);
        $id = $this->method() == 'PUT' ||  $this->method() == 'PATCH' ?  $segment : 'NULL';


        // $id = $this->method() == 'PUT' ?  \Request::segment(4) : 'NULL';
        return [
            'project_category_id'     => 'required|numeric',
            'project_name'            => 'required|unique:project_models,project_name,'.$id.',id,deleted_at,NULL|alpha_num|min:3|max:35',
            'description'             => 'required',
            'feature'                 => 'required',
            'available_qty'           => 'required|numeric',
            'project_number'          => 'required|alpha_num',
            'price'                   => 'required|alpha_num',
            'sales_price'             => 'required|alpha_num',
            'start_date'              => 'required|date',
            'end_date'                => 'required|date',
            'images'                  => 'nullable|image|mimes:jpg,png,gif|max:2048',
            'status'                  => 'required',






        ];
    }
}


   
 
   
  
 
       

