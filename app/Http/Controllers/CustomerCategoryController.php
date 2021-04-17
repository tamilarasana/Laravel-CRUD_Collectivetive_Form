<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerCategoryModel;
use Redirect,Response;

class CustomerCategoryController extends Controller
{
    private $customerCategory;

    public function __construct(CustomerCategoryModel  $customerCategory){ 
        $this->customerCategory = $customerCategory;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $customers  = CustomerCategoryModel::first()->paginate(4);
		return view('customers.index',compact('customers'))->with('i', (request()->input('page', 1) - 1) * 4);
		// return view('customers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->customerCategory->createcustomerCategory($request->except('_token'));  
        return view('customers.index')->with('success');
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
        $where = array('id' => $id);
		$customer = CustomerCategoryModel::where($where)->first();
		return Response::json($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cust = CustomerCategoryModel::where('id',$id)->delete();
		return Response::json($cust);
    }
}
