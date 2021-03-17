<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Redirect;
use File;

class EmployeeController extends Controller
{
    private  $employeeObject;

    public function __construct(Employee $employeeObject){     //Employee ->  Response and $employeeObject -> Request
        $this->employeeObject = $employeeObject;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $getEmployeeRecords = $this->employeeObject->getEmployeeRecords();   
       return view('employee.index', ['employee' => $getEmployeeRecords]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $storeEmployeedata = $this->employeeObject->createORupdateemployee($request);
        // dd($storeEmployeedata);
        return Redirect::route('employee.index')->with('success', 'created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit')->with('employee',$employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $storeEmployeedata = $this->employeeObject->createORupdateemployee($request, $id);
        return Redirect::route('employee.index')->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
       
        $deleteable_img  = $employee->empolyee_image; 
        
        if(!empty($deleteable_img)){
            unlink( $deleteable_img);
        $employee -> delete();
        return Redirect::route('employee.index')->with('success', 'deleted successfully.');
     }
    }
}



      
       
           
       
