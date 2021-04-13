<?php
 
 namespace App\Http\Traits;
 use App\Models\Department;

 trait DepartmentTrait{
     public function getDepartment(){
         $department = Department::all();
         return response()->json([
            'success' => true,
            'data' => $department
        ]);
     }
 }