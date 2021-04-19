<?php
 
 namespace App\Traits;
 use App\Models\ProjectModel;

trait ProjectTrait {

 	public function getAllProject($params = array()) {
        
 		return ProjectModel::getAllProjectByConditions($params);
 	}

 	public function createOrUpdateProject ($input) {

       
 	echo $input;
 	}

 	// public function getChecklistCategoryById($id) {
 	// 	return DepartmentModel::findOrFail($id);
 	// }
 	// public function deleteChecklistCategoryById($id) {
 	// 	$category =  ChecklistCategoryModel::findOrFail($id);
 	// 	$category->delete();
 	// 	return $category;
 	// }

   
     
 }