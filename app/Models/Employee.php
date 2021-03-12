<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Employee extends Model
{
    use HasFactory;
 
    protected $table = 'employee_details';
    protected $primaryKey = 'id';
    // protected $fillable = ['employee_id','employee_name','phone_number','employee_email','gender','date_of_birth','department','employee_address','empolyee_image'];
    public $timestamp = true;
     protected $fillable = ['employee_id','employee_name','phone_number','employee_email','gender','date_of_birth','department','employee_address','empolyee_image'];

    public function getEmployeeRecords(){
        $employee_details = Employee::get();      
        return $employee_details;
    }

    public function createORupdateemployee($request, $id=false){

        $data = $request->except('_token');
        // dd($data);
        $empolyee_image = '';
        if (@$request->all()['empolyee_image']) {
            $imageName = time().'.'.$request->empolyee_image->extension();  
            $request->empolyee_image->move(public_path('images'), $imageName);
            $empolyee_image = 'images'.'/'.$imageName;
        }
        $data['empolyee_image'] = $empolyee_image;
        if($id){
            $employee_data = Employee::findorFail($id);
            $employee_data->update($data);
        }else{
            $employee_data = Employee::create($data);
           
        }
        return $employee_data;
    }
}


