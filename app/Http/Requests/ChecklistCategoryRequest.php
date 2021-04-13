<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChecklistCategoryRequest extends FormRequest
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
            'name'     => 'required|max:35|unique:checklist_category,name,'.$id.',id,deleted_at,NULL',
           
        ];
    }
}
