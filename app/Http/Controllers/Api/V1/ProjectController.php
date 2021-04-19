<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Throwable;
use App\Traits\ProjectTrait;
use App\Http\Requests\ProjectRequest;


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
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="project_category_id",
     *                     type="integer"
     *                 ),
     *                 @OA\Property(
     *                     property="project_name",
     *                     type="string"
     *                 ),
     *                   @OA\Property(
     *                     property="description",
     *                     type="integer"
     *                 ),
     *                   @OA\Property(
     *                     property="feature",
     *                     type="integer"
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
     *                     type="date"
     *                 ),
     *                  @OA\Property(
     *                     property="end_date",
     *                     type="DateTime"  
     *                 ),
     *                  @OA\Property(
     *                     description="file to upload",
     *                     property="images",
     *                     type="string",
     *                     format="binary",
                    
     *                 ),
     *                  @OA\Property(
     *                     property="status",
     *                     type="integer"
     *                 ),
   
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
    public function store(Request $request) {
        

        try {
            $response = $this->createOrUpdateProject($request);

            $errorcode = 200;

        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;

        }

        return response()->json($response, $errorcode);

    }


   
}

