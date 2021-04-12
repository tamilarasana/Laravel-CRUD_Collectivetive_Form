<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;



class Department extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    use HasFactory; 
    protected $table = 'employee_details';
    protected $primaryKey = 'id';
    public $timestamp = true;
     protected $fillable = ['name','status','created_by','updated_by'];
     
}


