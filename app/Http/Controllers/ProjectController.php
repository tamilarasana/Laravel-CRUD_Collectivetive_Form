<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Models\ProjectModel;
use Redirect,Response;
use App\Models\CategoryModel;


class ProjectController extends Controller
{
    private $project;

    public function __construct(ProjectModel  $project){ 
        $this->project = $project;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
    //    dd("in");
        $customers  = ProjectModel::with('category')->get();   
        //  dd($customers);      
		return view('customers.index',compact('customers'));
        // ->with('i', (request()->input('page', 1) - 1) * 4);
		// return view('customers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = CategoryModel::orderby('name')->pluck('name', 'id')->toArray();
        return view('customers.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $this->project->createOrUpdateProject($request);  
        return redirect()->route('project.index')->with('success');
        //  return redirect('viewbook');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['project'] = ProjectModel::findOrFail($id);
        $data['categories'] = CategoryModel::orderby('name')->pluck('name', 'id')->toArray();
        
        return view('customers.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
         $data = $this->project->createOrUpdateProject($request, $id);
         return redirect()->route('project.index')->with('success');         
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cust = ProjectModel::find($id);
         $deleteable_img  = $cust->images;
        //   dd($deleteable_img); 
         if(!empty($deleteable_img) && file_exists($deleteable_img)){
         unlink(storage_path($deleteable_img));
         
         }
         $cust -> delete();
		 return Response::json($cust); 
    }
}
