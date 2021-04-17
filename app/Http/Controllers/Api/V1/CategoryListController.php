<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\CategoryTrait;
use Throwable;
use App\Http\Requests\CategoryRequest;



class CategoryListController extends Controller
{
    use CategoryTrait;
    /**
     * @OA\Get(
     ** path="/category-list",
     *   tags={"Category"},
     *   summary="List all  Category",
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
            $response = $this->getAllCategory($request->all());

            $errorcode = 200;

        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;

        }

        return response()->json($response, $errorcode);

    }       
     /**
     * @OA\Post(
     ** path="/category-list",
     *   tags={"Category"},
     *   summary="Store  category",
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
    public function store(CategoryRequest $request) {

        try {
            $response = $this->createOrUpdateCategory($request->all(), false, @request()->user()->id);

            $errorcode = 200;

        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;

        }

        return response()->json($response, $errorcode);

    }
    /**
     * @OA\Get(
     ** path="/category-list/{id}",
     *   tags={"Category"},
     *   summary="Edit Category",
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
            $response = $this->getCategoryById($id);

            $errorcode = 200;

        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;

        }

        return response()->json($response, $errorcode);

    }
    /**
     * @OA\Put(
     ** path="/category-list/{id}",
     *   tags={"Category"},
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
    public function update($id, CategoryRequest $request) {

        try {
            $response = $this->createOrUpdateCategory($request->all(), $id, @request()->user()->id);

            $errorcode = 200;

        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;

        }

        return response()->json($response, $errorcode);

    }
    /**
     * @OA\Delete(
     ** path="/category-list/{id}",
     *   tags={"Category"},
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
            $response = $this->deleteCategoryById($id);

            $errorcode = 200;

        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;

        }

        return response()->json($response, $errorcode);

    }
 
   
}
