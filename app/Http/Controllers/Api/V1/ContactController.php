<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Traits\ContactTrait;
use Throwable;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    use ContactTrait;
    /**
    * @OA\Get(
    * path="/contact",
    *   tags={"Contact"},
    *   summary="List all Contact",
    *   operationId="index", 
    *  @OA\Parameter(
    *     name="search",
    *     in="query",
    *     description=" Search ",
    *     required=false,
    *   ),
    *  @OA\Parameter(
    *     name="status",
    *     in="query",
    *     description=" Status ",
    *     required=false,
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
    *  )
    **/
    public function index(Request $request) {
        try {
            $response = $this->getAllContact($request->all());
            $errorcode = 200;
        } catch(Throwable $e) {
            $response['message'] = $e->getMessage(). ' Line'.@$e->getLine().' File '.@$e->getFile();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;
        }
        return response()->json($response, $errorcode);      
    }
     /**
     * @OA\Post(
     * path="/contact",
     *   tags={"Contact"},
     *   summary="Store Contact ",
     *   operationId="store",
     * @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",     *            
     *             @OA\Schema(       
     *                   @OA\Property(
     *                     property="first_name",
     *                     type="string",
     *                     example = "First Name"
     *                 ),
     *                   @OA\Property(
     *                     property="last_name",
     *                     type="string",
     *                     example = "Last Name"
     *                 ),
     *                  @OA\Property(
     *                     property="phone_number",
     *                     type="string",
     *                     example = "Phone Number"
     *                 ),
     *                  @OA\Property(
     *                     property="email",
     *                     type="string",
     *                     example = "Jhon@gmail.com"
     *                 ),
     *                   @OA\Property(
     *                     property="date_of_birth",
     *                     format="date",
     *                     type="string" 
     *                 ),
    *                   @OA\Property(
     *                     property="about_me",
     *                     type="string",
     *                     example = "About me"
     *                 ),
     *                  @OA\Property(
     *                     property="status",
     *                     type="integer",
     *                       example = "1"
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *  Store a newly created resource in storage
     */    
    public function store(ContactRequest $request) {    
        try {
            $response = $this->createOrUpdateContact($request->all());
            $errorcode = 200;
        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;
        }
        return response()->json($response, $errorcode);
    }
     /**
     * @OA\Get(
     * path="/contact/{id}",
     *   tags={"Contact"},
     *   summary="Show Contact",
     *   operationId="edit",
     *  @OA\Parameter(
     *    description="ID of contact",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     *    @OA\Schema(
     *       type="integer",
     *    )
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request) {
        try {
            $response = $this->getContactById($id);
            $errorcode = 200;
        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;
        }
        return response()->json($response, $errorcode);
    }
     /**
     * @OA\PUT(
     * path="/contact/{id}",
     *   tags={"Contact"},
     *   summary="Update Contact",
     *   operationId="put",
     *     *  @OA\Parameter(
     *    description="ID of Contact",
     *    in="path",
     *    name="id",
     *    required=true,
     *    @OA\Schema(
     *       type="integer",
     *      )
    *     ),
     * @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",     *            
     *             @OA\Schema(       
     *                   @OA\Property(
     *                     property="first_name",
     *                     type="string"
     *                 ),
     *                  
     *                   @OA\Property(
     *                     property="last_name",
     *                     type="string"
     *                 ),
     *                  @OA\Property(
     *                     property="phone_number",
     *                     type="string"
     *                 ),
     *                  @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                   @OA\Property(
     *                     property="date_of_birth",
     *                     format="date",
     *                     type="string" 
     *                 ),
    *                   @OA\Property(
     *                     property="about_me",
     *                     type="string"
     *                 ),
     *                  @OA\Property(
     *                     property="status",
     *                     type="integer"
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

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, ContactRequest $request) {
        try {
            $response = $this->createOrUpdateContact($request->all(), $id);
            $errorcode = 200;
        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;
        }
        return response()->json($response, $errorcode);
    }
    /**
    * @OA\Delete(
    *  path="/contact/{id}",
    *   tags={"Contact"},
    *   summary="Delete Contact",
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request) {
        try {
            $response = $this->deleteContactById($id);
            $errorcode = 200;
        } catch(Throwable $e) {
            $response['message'] = $e->getMessage();
            $errorcode = @$e->getCode() ? $e->getCode() : 500;
        }
        return response()->json($response, $errorcode);
    }
}