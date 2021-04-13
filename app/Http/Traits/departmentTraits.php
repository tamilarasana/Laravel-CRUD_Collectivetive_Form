<?php
 
 namespace App\Http\Traits;
 use App\Models\Department;

 trait QueryTrait{
     public function getDepartment(){
         $department = Department::all();
         return response()->json([
            'success' => true,
            'data' => $department
        ]);
     }
 }