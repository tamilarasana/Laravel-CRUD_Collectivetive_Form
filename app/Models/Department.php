<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Traits\DepartmentTrait;
use Throwable;



class Department extends Model implements Auditable
{
    use  DepartmentTrait;
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    use HasFactory; 
    protected $table = 'deparetments';
    protected $primaryKey = 'id';
    public $timestamp = true;
     protected $fillable = ['name','status','created_by','updated_by'];

     public function getDepartmentRecords(){
        try {
            $department = $this->getDepartments();
            return response()->json([
                'success' => true,
                'data' => $department
            ]);
        } catch (Throwable $e) {

            return response()->json([
                'success' => true,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function createDepartment($request){     
        try {
            $store = Department::create($request->all());
            return response()->json([
                'success' => true,
                'data' => $store->toArray()
            ]);
        } catch (Throwable $e) {        
            return response()->json([
               'success' => true,
               'message' => $e->getMessage()
            ]);
         }
       
      }  
    
    public function updateDepartment($request){ 
        try {
            $department = Department::findOrFail($request['id']); 
            $department->update($request);
            return response()->json([
                'success' => true,
                'data' => $department->toArray()
            ]);
        } catch (Throwable $e) {        
            return response()->json([
                'success' => true,
                'message' => $e->getMessage()
            ]);
            }

    }

     
}


