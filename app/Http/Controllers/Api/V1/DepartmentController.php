<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Throwable;



class DepartmentController extends Controller
{
   

    private  $departmentObject;

    public function __construct(Department $departmentObject){     //Employee ->  Response and $employeeObject -> Request
        $this->departmentObject = $departmentObject;
    }
    /**
     * @OA\Get(
     ** path="/department",
     *   tags={"Departments"},
     *   summary="test",
     *   operationId="index",
     *
     *  
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    public function index()
    {
        return $this->departmentObject->getDepartmentRecords(); 
       
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
     * @OA\Post(
     ** path="/department",
     *   tags={"Departments"},
     *   summary="store",
     *   operationId="store",
     * @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="status",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ), 
     * @OA\Parameter(
     *      name="created_by",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="updated_by",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    public function store(Request $request)
    {
        // $store = Department::create($request->all());
       try {
        $store = Department::create($request->all());
        return response()->json([
            'success' => true,
            'data' => $store->toArray()
        ]);
    } catch (Throwable $e) {        
        return response()->json([
           'success' => true,
           'message' => $e->getMessage()
        ]);
     }
        //  $this->departmentObject->createDepartment($request);  
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
     * @OA\GET(
     ** path="/department/{id}",    
     *   tags={"Departments"},
     *   summary="edit",
     *   operationId="edit",
     *
     * @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $department = Department::findOrFail($id);      
            return response()->json([
                'success' => true,
                'data' => $department->toArray()
            ]);
        } catch (Throwable $e) {        
            return response()->json([
                'success' => true,
                'message' => $e->getMessage()
            ]);
            }
           
    }
 /**
     * @OA\PUT(
     ** path="/department/{id}",
     *   tags={"Departments"},
     *   summary="update",
     *   operationId="update",
      * @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),

     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    
    public function update(Request $request)
    {
        return $this->departmentObject->getDepartmentRecords($request); 
        
      
    }
    /**
     * @OA\DELETE(
     ** path="/department/{id}",    
     *   tags={"Departments"},
     *   summary="delete",
     *   operationId="destroy",
     *
     * @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $department = Department::find($id);   
            $department -> delete();   
            return response()->json([
                'success' => true,
                'data' => $department->toArray()
            ]);
        } catch (Throwable $e) {        
            return response()->json([
                'success' => true,
                'message' => $e->getMessage()
            ]);
            }
           
    }
}
