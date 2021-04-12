<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empbook extends Model
{
    use HasFactory;
    protected $table = 'emp_book_pivot';
    protected $primaryKey = 'id';
    public $timestamp = true;
    protected $fillable = ['emp_id','book_id'];
}
