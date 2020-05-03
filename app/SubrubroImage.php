<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubrubroImage extends Model
{
    protected $fillable = [
        'subrubro_id', 'name', 'posicion'
      ];
    
      public function subrubro()
      {
        return $this->belongsTo(Subrubro::class);
      }
    
      public $timestamps = false;
}
