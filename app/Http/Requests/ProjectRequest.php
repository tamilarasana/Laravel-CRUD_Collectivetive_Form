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
        $id = $this->method() == 'PUT' ?  \Request::segment(4) : 'NULL';
        return [
            'project_category_id'     => 'required',
            'project_name'     => 'required',
            'description'     => 'required',
            'feature'         =>'required',
            'available_qty'   => 'required',
            'project_number'  =>'required',
            'price'           => 'required',
            'sales_price'     =>'required',
            'start_date'      =>  'required',
            'end_date'        =>  'required',
            'images'          => 'required',
            // 'images'          => 'required|image|mimes:jpg,png,gif|max:2048',
            'status'          =>'required',






        ];
    }
}


   
 
   
  
 
       

