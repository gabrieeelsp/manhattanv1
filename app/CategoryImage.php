<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryImage extends Model
{
    protected $fillable = [
        'category_id', 'name', 'posicion'
      ];
    
      public function category()
      {
        return $this->belongsTo(Category::class);
      }
    
      public $timestamps = false;
}
