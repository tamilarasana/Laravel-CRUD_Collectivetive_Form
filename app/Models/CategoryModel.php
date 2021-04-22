<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;



class CategoryModel extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    use HasFactory;
    protected $table = 'project_category';
    protected $fillable = ['name', 'status', 'created_by', 'updated_by'];

    public function scopegetAllCategoryByConditions($query, $conditions = array())
    {
        $query->select('id', 'name','status');
        return $query->get()->toArray();
    }
     
    public function getCategoryData()
    {
        $catagory  = CategoryModel::get();
        return $catagory;
    }

    public function createOrUpdatecategory($request, $id=false)
    { 
        $request = $request->except('_token');
        if($id){
            
            $category = CategoryModel::findorFail($id);
            $category->update($request);
        }else {                  
        $category = CategoryModel::create($request);
        }
        return $category->id;
    }

    // public function updateCategory($data){
    // $category= CategoryModel::findorFail($data["id"]);
    //     $category->update($data);
    //     return $data;
    // }
}
