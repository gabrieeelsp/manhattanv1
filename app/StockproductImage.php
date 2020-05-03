<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockproductImage extends Model
{
    protected $fillable = [
        'stockproduct_id', 'name', 'posicion'
      ];
    
      public function stockproduct()
      {
        return $this->belongsTo(Stockproduct::class);
      }
    
      public $timestamps = false;
}
