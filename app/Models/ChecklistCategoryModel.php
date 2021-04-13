<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Traits\DepartmentTrait;
use Throwable;



class ChecklistCategoryModel extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    use HasFactory; 
    protected $table = 'checklist_category';
    protected $fillable = ['name','status','created_by','updated_by'];

    public function scopeGetAllChecklistcategoryByConditions($query, $conditions = array())
    {
        $query->select('id', 'name','status');
        return $query->get()->toArray();
    }

    

     
}


