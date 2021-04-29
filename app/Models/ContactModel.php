<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Carbon\Carbon;
use DB;


class ContactModel extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    use HasFactory;
    protected $table = 'contact';
    protected $fillable = ['first_name', 'last_name', 'phone_number', 'email', 'date_of_birth', 'about_me', 'status'];

    public function scopegetAllContactByConditions($query, $conditions)
    {
        // $data = $conditions['search'];
        $query->select('id', 'first_name', 'last_name', 'phone_number', 'email', 'date_of_birth', 'about_me', 'status', DB::raw("CONCAT(contact.first_name,' ',contact.last_name) as full_name"));

        if (@$conditions['search']) {
            $search = $conditions['search'];

            $query->where(function ($query) use ($search) {
                $query->where('id', 'like', '%' . $search . '%')
                    ->orwhere('first_name', 'like', '%' . $search . '%')
                    ->orwhere('last_name', 'like', '%' . $search . '%')
                    ->orwhere('email', 'like', '%' . $search . '%')
                    ->orwhere('phone_number', 'like', '%' . $search . '%')
                    ->orwhere('date_of_birth', 'like', '%' . $search . '%')
                    ->orwhere('status', 'like', '%' . $search . '%');
            });
        }  
            if (@$conditions['status']) {
                $query->where('status','=',$conditions['status']);
            }        
        return $query->get()->toArray();
    }

    public function getDateOfBirthAttribute($date){
        return Carbon::parse($date)->format('d.m.Y');
    }

    public function setDateOfBirthAttribute($date){
        $this->attributes['date_of_birth']  = Carbon::parse($date)->format('Y-m-d');
    }

    public function getContactData(){
        $contact  = ContactModel::get();
        return $contact;
    }
    
    public function createOrUpdateContact($request, $id=false){
        $request = $request->except('_token');
        if($id){    
            $contact = ContactModel::findorFail($id);
            $contact->update($request);
        }else {                  
            $contact = ContactModel::create($request);
        }
        return $contact->id;
    }
}


    
   
  
                 






   
   