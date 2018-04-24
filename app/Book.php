<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "books";
    protected $fillable = ['isbn','title','author','publisher','company_release', 'id_type', 'description','page','release_date','unit_price','promotion_price','image','unit','new','view'];

    public function book_type(){
    	return $this->belongsTo('App\BookType','id_type','id');
    }
    public function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_book','id');
    }
}
