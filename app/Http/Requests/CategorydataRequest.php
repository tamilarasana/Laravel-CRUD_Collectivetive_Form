<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategorydataRequest  extends FormRequest
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
        $id = $this->method() == 'PUT' ||  $this->method() == 'PATCH' ?  \Request::segment(2) : 'NULL';

        return [
            'name'       => 'required|unique:project_category,name,'.$id.',id,deleted_at,NULL|alpha_num|min:3|max:15',
           
        ];
    }
}
