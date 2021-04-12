<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Empbook;
use Carbon\Carbon;
use OwenIt\Auditing\Contracts\Auditable;




class Employee extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    use HasFactory; 
    protected $table = 'employee_details';
    protected $primaryKey = 'id';
    public $timestamp = true;
     protected $fillable = ['employee_id','employee_name','phone_number','employee_email','gender','date_of_birth','department','employee_address','empolyee_image'];

    public function getEmployeeRecords(){
        // $employee_details = Employee::->get();
         $employee_details = Employee::with('empbook')->simplepaginate(5);     
        return $employee_details;
    }

    public function createORupdateemployee($request, $id=false){
            // dd($request['book_name']);
        $data = $request->except('_token');
        $empolyee_image = '';
        if (@$request->all()['empolyee_image']) {
            $imageName = time().'.'.$request->empolyee_image->extension();  
            $request->empolyee_image->move(public_path('images'), $imageName);
            $empolyee_image = 'images'.'/'.$imageName;
        }
        if($id){
            $employee_data = Employee::findorFail($id);
            if ($empolyee_image) {
                $image = '/'.$employee_data->empolyee_image;
                $path = str_replace('\\','/',public_path());
                if(file_exists($path.$image)){
                    unlink($path.$image);
                } 
                $data['empolyee_image'] = $empolyee_image ;
            }
            $employee_data->update($data);
        }else {
            $data['empolyee_image'] = $empolyee_image ;
            $employee_data = Employee::create($data);
            $this->attachOrDetachBooks( $employee_data, $request);
            // dd($employee_data);
        }
        return $employee_data->id;  
   
    }
     public function attachOrDetachBooks($employee_data, $request)
            
     {
        $employee_data->empbook()->detach();
        if (@$request['book_name']) {
            foreach ($request['book_name'] as $value) { // [1, 3, 8]
                $employee_data->empbook()->attach($value);
            }
        }
    }
    // mutators
    public function setEmployeeNameAttribute($value){
        $this->attributes['employee_name'] = ucfirst($value);
    }
    public function setDepartmentAttribute($value){
        $this->attributes['department'] = ucfirst($value);
    }   
    
    public function setDateofBirthAttribute($value)
    {
       $this->attributes['date_of_birth']  = \Carbon\Carbon::createFromFormat('Y-m-d', $value)->format('m/d/Y');
    }
     // Accessors
     public function getEmployeeNameAttribute($value){
        return strtoupper($value);
    }
    public function getDateofBirthAttribute($value)
    {
         return Carbon::parse($value)->format('m/d/Y');
    }

    public function updateEmployeeaddress($data){
        $employee_data = Employee::findorFail($data["id"]);     
        $employee_data->update($data);
        return $employee_data;
        
    }
    public function empbook(){
        return $this->belongsToMany(Book::class, 'emp_book_pivot', 'emp_id', 'book_id');
    }
}


