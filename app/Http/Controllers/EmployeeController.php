<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Book;
use Redirect;
use File;
use PDF;
use Toastr;
use Carbon\Carbon;

use App\DataTables\EmployeeDataTable;

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
    public function index(){

       $getEmployeeRecords = $this->employeeObject->getEmployeeRecords();   
    //    $post = $this->employeeObject->empbook();
       return view('employee.index', ['employee' => $getEmployeeRecords]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $data['book'] = Book::pluck('book_name' , 'id');
        return view('employee.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Store a newly created resource in storage
    public function store(EmployeeRequest $request){
        //dd($request->all());
        $storeEmployeedata = $this->employeeObject->createORupdateemployee($request);
       
    //    dd($storeEmployeedata);
        // dd($request["book_name"])
            $this->employeeObject->empbook($request);
           Toastr::success('Created successfully :)','Success');
        return Redirect::route('employee.index');
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
        Toastr::info('Update successfully :)','Success');
        return Redirect::route('employee.index');
        // ->with('success', 'Updated successfully.')
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $employee = Employee::find($id);       
        $deleteable_img  = $employee->empolyee_image;         
        if(!empty($deleteable_img)){
            unlink( $deleteable_img);
            $employee -> delete();
            Toastr::warning('Delete successfully :)','Success');
            return Redirect::route('employee.index');
            // ->with('success', 'deleted successfully.')
        }
    }
     
    public function getEmployeeById($id) {
        $employee = Employee::find($id);   
        return response()->json($employee);
    }
    //update address only 
    public function updateAddress(Request  $request){       
      $data =  $this->employeeObject->updateEmployeeaddress($request->except('_token'));
    }

    //download employee data in pdf 
    public function downloadPDF($id){
        $employee = Employee::find($id);
        $pdf = PDF::loadView('employee.edit', compact('employee'));
        return $pdf->download('employees.pdf');
    }

     // Helper function
    public function checkHelper(){
       $value = getMyText();
       $arrValue = makeArray($value);
       return $arrValue;
    }

    public function employeeDeatils(EmployeeDataTable $dataTable){
         return $dataTable->render('employee.employeedetails');
    }
    
}



      
       
           
       
