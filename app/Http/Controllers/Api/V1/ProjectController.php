<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Throwable;
use App\Traits\ProjectTrait;
use App\Http\Requests\ProjectRequest;
use App\Models\ProjectModel;



class ProjectController extends Controller
{

     use ProjectTrait;
    /**
     * @OA\Get(
     ** path="/project",
     *   tags={"Project"},
     *   summary="List all",
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
    public function index(Request $request) {
        

        try {
            $response = $this->getAllProject($request->all());
            $errorcode = 200;

        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;

        }

        return response()->json($response, $errorcode);

    }
    /**
     * @OA\Post(
     ** path="/project",
     *   tags={"Project"},
     *   summary="Store checklist category",
     *   operationId="store",
     * @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *            
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="project_category_id",
     *                     type="integer"
     *                 ),
     *            
    *                 @OA\Property(
     *                     property="project_name",
     *                     type="string"
     *                 ),
     *                   @OA\Property(
     *                     property="description",
     *                     type="string"
     *                 ),
     *                   @OA\Property(
     *                     property="feature",
     *                     type="string"
     *                 ),
     *                  @OA\Property(
     *                     property="available_qty",
     *                     type="integer"
     *                 ),
     *                   @OA\Property(
     *                     property="project_number",
     *                     type="string"
     *                 ),
     *                   @OA\Property(
     *                     property="price",
     *                     type="string"
     *                 ),
     *                   @OA\Property(
     *                     property="discount",
     *                     type="string"
     *                 ),
     *                   @OA\Property(
     *                     property="sales_price",
     *                     type="string"
     *                 ),
     *                   @OA\Property(
     *                     property="start_date",
     *                     format="date",
     *                     type="date" ,
     *                     example="yyyy-mm-dd"
     *                 ),
     * 
     * 
     *                  @OA\Property(
     *                     format="date",
     *                     description="Datetime marker of verification status", 
     *                     property="end_date",
     *                      type="date" ,
     *                     example="yyyy-mm-dd"
     *                 ),
     * 
     *                     @OA\Property(
     *                     description="file to upload",
     *                     property="images",
     *                     type="file",
     *                     format="file",
     *                 ),   
     *                 
     *                  @OA\Property(
     *                     property="status",
     *                     type="tinyInteger"
     *                 ),
   
     *             )
     *         )
     *     ),
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
    public function store(ProjectRequest $request) {
    

        try {
            $response = $this->createOrUpdateProject($request);

            $errorcode = 200;

        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;

        }

        return response()->json($response, $errorcode);

    }
/**
     * @OA\Get(
     ** path="/project/{id}",
     *   tags={"Project"},
     *   summary="Edit Project",
     *   operationId="edit",
     *  @OA\Parameter(
     *    description="ID of category",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     *    @OA\Schema(
     *       type="integer",
     *    )
     * ),
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

    public function show($id, Request $request) {

        try {
            $response = $this->getProjectById($id);

            $errorcode = 200;

        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;

        }

        return response()->json($response, $errorcode);

    }
    
  /**
     * @OA\Post(
     * path="/project/{id}",
     *   tags={"Project"},
     *   summary="Update Project",
     *   operationId="put",
     *  @OA\Parameter(
     *    description="ID of category",
     *    in="path",
     *    name="id",
     *    required=true,
     *    @OA\Schema(
     *       type="integer",
     *      )
    *     ),
     * @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *            
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="project_category_id",
     *                     type="integer"
     *                 ),
     *            
    *                 @OA\Property(
     *                     property="project_name",
     *                     type="string"
     *                 ),
     *                   @OA\Property(
     *                     property="description",
     *                     type="string"
     *                 ),
     *                   @OA\Property(
     *                     property="feature",
     *                     type="string"
     *                 ),
     *                  @OA\Property(
     *                     property="available_qty",
     *                     type="integer"
     *                 ),
     *                   @OA\Property(
     *                     property="project_number",
     *                     type="string"
     *                 ),
     *                   @OA\Property(
     *                     property="price",
     *                     type="string"
     *                 ),
     *                   @OA\Property(
     *                     property="discount",
     *                     type="string"
     *                 ),
     *                   @OA\Property(
     *                     property="sales_price",
     *                     type="string"
     *                 ),
     *                   @OA\Property(
     *                     property="start_date",
     *                     format="date",
     *                     type="date" ,
     *                     example="yyyy-mm-dd"
     *                 ),
     * 
     * 
     *                  @OA\Property(
     *                     format="date",
     *                     description="Datetime marker of verification status", 
     *                     property="end_date",
     *                      type="date" ,
     *                     example="yyyy-mm-dd"
     *                 ),
     * 
     *                     @OA\Property(
     *                     description="file to upload",
     *                     property="images",
     *                     type="file",
     *                     format="file",
     *                 ),   
     *                 
     *                  @OA\Property(
     *                     property="status",
     *                     type="tinyInteger"
     *                 ),
   
     *             )
     *         )
     *     ),
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
    public function update($id, ProjectRequest $request) {        

        try {

            $response =  $this->createOrUpdateProject($request ,$id);

            $errorcode = 200;

        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;

        }

        return response()->json($response, $errorcode);

    }


   
/**
     * @OA\Delete(
     **  path="/project/{id}",
     *   tags={"Project"},
     *   summary="Delete Project",
     *   operationId="delete",
     *  @OA\Parameter(
     *    description="ID of category",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     *    @OA\Schema(
     *       type="integer",
     *    )
     * ),
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
    public function destroy($id, Request $request) {

        try {
            $response = $this->deleteProjectById($id);

            $errorcode = 200;

        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;

        }

        return response()->json($response, $errorcode);

    }
   

   
}


