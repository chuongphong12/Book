<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = "bill_detail";
    protected $fillable = ['id_bill', 'id_book', 'quantity','unit_price'];

    public function book(){
    	return $this->belongsTo('App\Book','id_book','id');
    }

    public function bill(){
    	return $this->belongsTo('App\Bill','id_bill','id');
    }
}
