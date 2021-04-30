<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;
use App\Http\Requests\ContactRequest;
use App;
use Toastr;
use Throwable;

class ContactController extends Controller
{
    private $contactObject;

    public function __construct(ContactModel  $contactObject)
    {
        $this->contactObject = $contactObject;
    }

    // Display a listing of the resource.

    public function index()
    {
        try {
            $contact = $this->contactObject->getContactData();
            return view('contact.index', compact('contact'));
        } catch (Throwable $e) {
            $response['Contact'] = $e->getMessage();
        }
        return response()->json($response);
    }

    // Show the form for creating a new resource.

    public function create()
    {
        try {
            return view('contact.create');
        } catch (Throwable $e) {
            $response['Contact'] = $e->getMessage();
        }
        return response()->json($response);
    }

    // Store a newly created resource in storage.

    public function store(ContactRequest $request)
    {
        try {
            $contact = $this->contactObject->createOrUpdateContact($request);
            Toastr::success('Contact Created successfully :)', 'Success');
            return redirect()->route('contact.index');
        } catch (Throwable $e) {
            $response['Contact'] = $e->getMessage();
        }
        return response()->json($response);
    }

    // Show the form for editing the specified resource.

    public function edit($id)
    {
        try {
            $contact['contacts'] = ContactModel::findOrFail($id);
            return view('contact.edit', $contact);
        } catch (Throwable $e) {
            $response['Contact'] = $e->getMessage();
        }
        return response()->json($response);
    }

    // Update the specified resource in storage.

    public function update(Request $request, $id)
    {
        try {
            $contact = $this->contactObject->createOrUpdateContact($request, $id);
            Toastr::success('Contact Update successfully :)', 'Success');
            return redirect()->route('contact.index');
        } catch (Throwable $e) {
            $response['Contact'] = $e->getMessage();
        }
        return response()->json($response);
    }

    // Remove the specified resource from storage.

    public function destroy($id)
    {
        try {
            $contact = ContactModel::find($id);
            $contact->delete();
            return response()->json(['message' => 'Contact deleted successfully!']);
        } catch (Throwable $e) {
            $response['Contact'] = $e->getMessage();
        }
        return response()->json($response);
    }

    // Change the language
    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
