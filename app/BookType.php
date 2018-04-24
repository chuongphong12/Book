<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookType extends Model
{
    protected $table = "type_books"; 
    protected $fillable = ['name', 'description'];

    public function product(){
    	return $this->hasMany('App\Book','id_type','id');
    }
}
