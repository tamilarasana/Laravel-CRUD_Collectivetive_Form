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

    public function createCategory($data)
    { 
        $data = CategoryModel::create($data);
        return $data;
    }

    public function updateCategory($data){
    $category= CategoryModel::findorFail($data["id"]);
        $category->update($data);
        return $data;
    }
}
