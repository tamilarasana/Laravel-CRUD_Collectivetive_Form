<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Carbon\Carbon;

class ProjectModel extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    protected $table = 'project_models';
    protected $fillable = ['project_category_id','project_name','description','feature','available_qty','project_number','price','discount','sales_price','start_date','end_date','images','status'];


    public function scopegetAllProjectByConditions($query, $conditions = array())
    {
       
        $query->select('project_category_id','project_name','description','feature','available_qty','project_number','price','discount','sales_price','start_date','end_date','images','status');
        return $query->get()->toArray();
    }
     

    public function createOrUpdatecustomerCategory($request,$id=false)
    {
       
        $data = $request->except('_token');  
          
        $customer_image = '';
        if (@$request->all()['images']) {
            $imageName = time().'.'.$request->images->extension();  
            $request->images->move(storage_path('images'), $imageName);
            $customer_image = 'images'.'/'.$imageName;
        }
        if($id){
            $customer_data = ProjectModel::findorFail($id);
            if ($customer_image) {
                $image = '/'.$customer_data->images;
                $path = str_replace('\\','/',public_path());
                if(file_exists($path.$image)){
                    unlink($path.$image);
                } 
                $data['customer_image'] = $customer_image;
            }
              $customer_data->update($data);
        }else {

            $data['images'] = $customer_image;
            
    
        $customer_data = ProjectModel::create($data);
       }
        return $customer_data->id;  
    }

        public function getStartDateAttribute($value)
    {
         return Carbon::parse($value)->format('d.m.Y');
    }
    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y');
    }
    public function setStartDateAttribute($value)
    {
       $this->attributes['start_date']  = Carbon::parse($value)->format('Y-m-d');
    }
    public function setEndDateAttribute($value)
    {
       $this->attributes['end_date'] = Carbon::parse($value)->format('Y-m-d');
    }
    public function category(){
        return $this->belongsTo('App\Models\CategoryModel');
    }
    

    
}
