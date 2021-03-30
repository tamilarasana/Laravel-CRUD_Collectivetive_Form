<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $fillable = ['book_name'];

    public function getBookRecords(){
        $book_detais  = Book::get();
        return $book_detais;
    }
    public function createBook($data)
    {
        $data = Book::create($data);
        return $data;
    }
    public function updatebook($data){
        //dd($data);
    $book= Book::findorFail($data["id"]);
    
                //  dd($data);
        $book->update($data);
        return $data;
    }

   
}