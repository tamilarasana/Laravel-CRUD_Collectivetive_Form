<?php
 
 namespace App\Traits;
 use App\Models\CategoryModel;

trait CategoryTrait {

 	public function getAllCategory($params = array()) {
 		return CategoryModel::getAllCategoryByConditions($params);
 	}

 	public function createOrUpdateCategory($input = array() , $id = false, $userId = 0) {

 		if($id)
 		{
 			$category = CategoryModel::findOrFail($id);
 			$input['updated_by'] = $userId;
 			$category->update($input);

 		} else {
 			$input['created_by'] = $userId;
 			$category = new CategoryModel($input);
 			$category->save();

 		}
 		return $category;
 	}

 	public function getCategoryById($id) {
 		return CategoryModel::findOrFail($id);
 	}
 	public function deleteCategoryById($id) {
 		$category =  CategoryModel::findOrFail($id);
 		$category->delete();
 		return $category;
 		
 	}

   
     
 }