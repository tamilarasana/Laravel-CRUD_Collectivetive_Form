<?php

namespace App\Http\Controllers;
use App\DataTables\CategoryDataTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CategorydataRequest;
use App\Models\CategoryModel;
use Redirect;

class CategoryController extends Controller
{
    private  $categoryObject;

    public function __construct(CategoryModel  $categoryObject){     
        $this->categoryObject = $categoryObject;
    }

    public function index(){   
        
        $category = $this->categoryObject-> getCategoryData();
        return view('category.categorydetails', compact('category'));
   }

   public function store(CategorydataRequest $request){
       $this->validate($request,['name'=> 'required']);
   $data = $this->categoryObject->createCategory($request->except('_token')); 
   return redirect('/category')->with('success', 'Category saved');
//    return Redirect::route('category'); 
   }


   public function edit($id){
    $category = CategoryModel::find($id);    
    return view('category.editcategory')->with('category',$category);
   }
   public function update(CategorydataRequest $request)
   {
       $data = $this->categoryObject->updateCategory($request->except('_token'));  
       return Redirect::route('category.index'); 
    //    return Redirect::route('employee.index');
       // $employee_data = Employee::findorFail($id);
   }

   public function destroy($id){
    $category = CategoryModel::find($id);           
    $category -> delete();           
    return  Redirect::route('category.index');

   }
   
}
