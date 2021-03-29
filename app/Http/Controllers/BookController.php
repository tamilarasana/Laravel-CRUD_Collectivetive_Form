<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Redirect;

class BookController extends Controller
{

    private  $bookObject;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Book  $bookObject){     //Book ->  Response and $bookObject -> Request
        $this->bookObject = $bookObject;
    }
    public function addNewBook(){
        return view('employee.addNewbook');
    }  
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBook(Request $request)
    {
         $data = $this->bookObject->createBook($request->except('_token'));  
         return redirect('viewbook');        
    }
    public function viewBook(){
        $getRecords = $this->bookObject-> getBookRecords();
        return view('employee.viewbook',compact('getRecords'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editBook($id)
    {
        $book= Book::find($id);        
        return view('employee.editbook')->with('book',$book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $this->bookObject->updateBook($request->except('_token'));  
        return redirect('viewbook'); 
        // $employee_data = Employee::findorFail($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Book::find($id);           
            $employee -> delete();           
            return redirect('viewbook');
    }
}
