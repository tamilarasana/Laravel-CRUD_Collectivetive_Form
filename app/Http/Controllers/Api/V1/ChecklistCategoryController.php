<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ChecklistCategoryTrait;
use Throwable;
use App\Http\Requests\ChecklistCategoryRequest;



class ChecklistCategoryController extends Controller
{
    use ChecklistCategoryTrait;
    /**
     * @OA\Get(
     ** path="/checklist-category",
     *   tags={"Checklist Category"},
     *   summary="List all Checklist Category",
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
            $response = $this->getAllChecklistcategory($request->all());

            $errorcode = 200;

        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;

        }

        return response()->json($response, $errorcode);

    }

    /**
     * @OA\Post(
     ** path="/checklist-category",
     *   tags={"Checklist Category"},
     *   summary="Store checklist category",
     *   operationId="store",
     * @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="name",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="status",
 *                     type="integer"
 *                 ),
 *                 
 *             )
 *         )
 *     ),
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
    public function store(ChecklistCategoryRequest $request) {

        try {
            $response = $this->createOrUpdateChecklistcategory($request->all(), false, @request()->user()->id);

            $errorcode = 200;

        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;

        }

        return response()->json($response, $errorcode);

    }
    /**
     * @OA\Get(
     ** path="/checklist-category/{id}",
     *   tags={"Checklist Category"},
     *   summary="Edit Checklist Category",
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
            $response = $this->getChecklistCategoryById($id);

            $errorcode = 200;

        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;

        }

        return response()->json($response, $errorcode);

    }
    /**
     * @OA\Put(
     ** path="/checklist-category/{id}",
     *   tags={"Checklist Category"},
     *   summary="update checklist category",
     *   operationId="put",
     *@OA\Parameter(
     *    description="ID of category",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     *    @OA\Schema(
     *       type="integer",
     *    )
     * ),
     * @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="name",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="status",
 *                     type="integer"
 *                 ),
 *               
 *             )
 *         )
 *     ),
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
    public function update($id, ChecklistCategoryRequest $request) {

        try {
            $response = $this->createOrUpdateChecklistcategory($request->all(), $id, @request()->user()->id);

            $errorcode = 200;

        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;

        }

        return response()->json($response, $errorcode);

    }

    /**
     * @OA\Delete(
     ** path="/checklist-category/{id}",
     *   tags={"Checklist Category"},
     *   summary="Edit Checklist Category",
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
            $response = $this->deleteChecklistCategoryById($id);

            $errorcode = 200;

        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;

        }

        return response()->json($response, $errorcode);

    }
   

   
}
