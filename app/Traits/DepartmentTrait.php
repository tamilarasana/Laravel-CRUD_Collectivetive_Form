<?php
 
 namespace App\Traits;
 use App\Models\Department;

 trait DepartmentTrait{
     /**
      * 
      */
     public function getDepartments(){
         return  Department::all();
        
     }
     
 }