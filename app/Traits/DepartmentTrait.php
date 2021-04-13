<?php
 
 namespace App\Traits;
 use App\Models\DepartmentModel;

trait DepartmentTrait {

 	public function getAllDepartment($params = array()) {
 		return DepartmentModel::getAllDepartmentByConditions($params);
 	}

 	public function createOrUpdateDepartment($input = array() , $id = false, $userId = 0) {

 		if($id)
 		{
 			$department = DepartmentModel::findOrFail($id);
 			$input['updated_by'] = $userId;
 			$department->update($input);

 		} else {
 			$input['created_by'] = $userId;
 			$department = new DepartmentModel($input);
 			$department->save();

 		}
 		return $department;
 	}

 	public function getDepartmentById($id) {
 		return DepartmentModel::findOrFail($id);
 	}
 	public function deleteDepartmentById($id) {
 		$department =  DepartmentModel::findOrFail($id);
 		$department->delete();
 		return $department;
 		
 	}

   
     
 }