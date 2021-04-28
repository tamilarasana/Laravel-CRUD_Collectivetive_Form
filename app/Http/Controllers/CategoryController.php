<?php

namespace App\Http\Controllers;
use App\DataTables\CategoryDataTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CategorydataRequest;
use App\Models\CategoryModel;
use Redirect;
use App;

class CategoryController extends Controller
{
    private  $categoryObject;

    public function __construct(CategoryModel  $categoryObject){     
        $this->categoryObject = $categoryObject;
    }

    public function index(){ 
        $category = $this->categoryObject-> getCategoryData();
        return view('category.index', compact('category'));
   }
   public function create(){
        return view('category.create');
   }

   public function store(CategorydataRequest $request){
        // $this->validate($request,['name'=> 'required']);
        $data = $this->categoryObject->createOrUpdatecategory($request); 
        return redirect('/category')->with('success', 'Category saved');
   }

   public function edit($id){
         //$category = CategoryModel::find($id);
        $category['category'] = CategoryModel::findOrFail($id); 
        return view('category.edit',$category);
   }

   public function update(CategorydataRequest $request, $id){
                
        $data = $this->categoryObject->createOrUpdatecategory($request, $id);
        return Redirect::route('category.index'); 
   }

   public function destroy($id){   
        $category = CategoryModel::find($id);    
        $category->delete();           
        return response()->json([
          'message' => 'Data deleted successfully!'
        ]); 
   }

   public function lang($locale)
     {
          App::setLocale($locale);
          session()->put('locale', $locale);
          return redirect()->back();
     }

}
