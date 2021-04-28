<?php
 
 namespace App\Traits;
 use App\Models\ContactModel;

trait ContactTrait {

    public function getAllContact($params = array()) {
        // print_r($params);
        return ContactModel::getAllContactByConditions($params);
    }

    /**
     * Create Or Update 
     */
    public function createOrUpdateContact($input = array() , $id = false) {   
        if($id)
        {
            $contact = ContactModel::findOrFail($id);
            $contact->update($input);
        } else {
            // $contact = ContactModel::create($input);
            $contact = new ContactModel($input);
            $contact->save();
        }
        return $contact;
    }

    /**
     * Get Contact Using by id 
     */
    public function getContactById($id){  
        return ContactModel::findOrFail($id);
    }
    /**
     *  Delete Contact 
     */
    public function deleteContactById($id) {
        $contact =  ContactModel::findOrFail($id);
        $contact->delete();
        return $contact;
    } 
}