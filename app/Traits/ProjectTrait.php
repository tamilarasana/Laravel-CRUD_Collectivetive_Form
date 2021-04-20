<?php
 
 namespace App\Traits;
 use App\Models\ProjectModel;

trait ProjectTrait {

 	public function getAllProject($params = array()) {
        
 		return ProjectModel::getAllProjectByConditions($params);
 	}

 	public function createOrUpdateProject($request,$id=false) {

		$data = $request->except('_token');        
        $customer_image = '';
        if (@$request->all()['images'] && !empty($request->all()['images'])) {
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
        return $customer_data;  

		// $category = new ProjectModel($request);
		// $category->save();

 	}

 	public function getProjectById($id) {
		return ProjectModel::findOrFail($id);
	}

 	 public function deleteProjectById($id) {
 	 	    $project =  ProjectModel::findOrFail($id);
	    	$deleteable_img  = $project->images;
		       if(!empty($deleteable_img)){
			       unlink(storage_path($deleteable_img));
 	            	$project->delete();
 	 	           return $project;
                 } 	  

      }

     
 }