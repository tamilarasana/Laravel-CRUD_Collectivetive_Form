<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\DepartmentTrait;
use Throwable;
use App\Http\Requests\DepartmentRequest;



class DepartmentController extends Controller
{
    use DepartmentTrait;
    /**
     * @OA\Get(
     ** path="/department",
     *   tags={"Department"},
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
            $response = $this->getAllDepartment($request->all());

            $errorcode = 200;

        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;

        }

        return response()->json($response, $errorcode);

    }       
     /**
     * @OA\Post(
     ** path="/department",
     *   tags={"Department"},
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
     *                 example={ "name": "Jessica Smith", "status" : "1"}
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
    public function store(DepartmentRequest $request) {

        try {
            $response = $this->createOrUpdateDepartment($request->all(), false, @request()->user()->id);

            $errorcode = 200;

        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;

        }

        return response()->json($response, $errorcode);

    }
    /**
     * @OA\Get(
     ** path="/department/{id}",
     *   tags={"Department"},
     *   summary="Edit Department",
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
            $response = $this->getDepartmentById($id);

            $errorcode = 200;

        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;

        }

        return response()->json($response, $errorcode);

    }
    /**
     * @OA\Put(
     ** path="/department/{id}",
     *   tags={"Department"},
     *   summary="update Department",
     *   operationId="put",
     * @OA\Parameter(
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
 *                 example={ "name": "Jessica Smith", "status" : "1"}
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
    public function update($id, DepartmentRequest $request) {

        try {
            $response = $this->createOrUpdateDepartment($request->all(), $id, @request()->user()->id);

            $errorcode = 200;

        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;

        }

        return response()->json($response, $errorcode);

    }
    /**
     * @OA\Delete(
     ** path="/department/{id}",
     *   tags={"Department"},
     *   summary="Edit Department",
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
            $response = $this->deleteDepartmentById($id);

            $errorcode = 200;

        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;

        }

        return response()->json($response, $errorcode);

    }
 
   
}
