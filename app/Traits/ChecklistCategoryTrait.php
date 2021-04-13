<?php
 
 namespace App\Traits;
 use App\Models\ChecklistCategoryModel;

trait ChecklistCategoryTrait {

 	public function getAllChecklistcategory($params = array()) {
 		return ChecklistCategoryModel::getAllChecklistcategoryByConditions($params);
 	}

 	public function createOrUpdateChecklistcategory($input = array() , $id = false, $userId = 0) {

 		if($id)
 		{
 			$category = ChecklistCategoryModel::findOrFail($id);
 			$input['updated_by'] = $userId;
 			$category->update($input);

 		} else {
 			$input['created_by'] = $userId;
 			$category = new ChecklistCategoryModel($input);
 			$category->save();

 		}
 		return $category;
 	}

 	public function getChecklistCategoryById($id) {
 		return DepartmentModel::findOrFail($id);
 	}
 	public function deleteChecklistCategoryById($id) {
 		$category =  ChecklistCategoryModel::findOrFail($id);
 		$category->delete();
 		return $category;
 	}

   
     
 }