<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    protected $fillable = [
        'name', 'slug',
    ];

    public function subrubros()
    {
        return $this->hasMany(Subrubro::class);
    }

    public $timestamps = false;
}
