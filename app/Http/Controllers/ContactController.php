<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;
use App\Http\Requests\ContactRequest;
use App;

class ContactController extends Controller
{
    private $contactObject;

    public function __construct(ContactModel  $contactObject){     
        $this->contactObject = $contactObject;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = $this->contactObject->getContactData();
        return view ('contact.index', compact('contact'));   
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $contact = $this->contactObject->createOrUpdateContact($request);  
        return redirect()->route('contact.index')->with('success');
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
        $contact['contacts'] = ContactModel::findOrFail($id); 
        return view('contact.edit',$contact);
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
        $contact = $this->contactObject->createOrUpdateContact($request, $id);
        return redirect()->route('contact.index')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = ContactModel::find($id);    
        $contact->delete();           
        return response()->json([
          'message' => 'Data deleted successfully!'
        ]); 
    }

    public function lang($locale)
    {
        // dd($locale);
         App::setLocale($locale);
         session()->put('locale', $locale);
         return redirect()->back();
    }
}
