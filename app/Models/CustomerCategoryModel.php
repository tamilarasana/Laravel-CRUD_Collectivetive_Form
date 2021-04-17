<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class CustomerCategoryModel extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    protected $table = 'category_customers';
    protected $fillable = ['project_category_id','project_name','description','feature','available_qty','project_number','price','discount','sales_price','start_date','end_date','images','status'];

    public function createcustomerCategory($category)
    {
        //  dd($category);
        $data = CustomerCategoryModel::create($category);
        return $data;
    }
}
