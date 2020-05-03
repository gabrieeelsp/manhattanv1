<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subrubro extends Model
{
    protected $fillable = [
        'rubro_id', 'name', 'slug', 'img_principal_id', 'web_enable'
    ];

    public function rubro()
    {
        return $this->belongsTo(Rubro::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function images()
    {
        return $this->hasMany('App\SubrubroImage');
    }
    public function getMaxImagePosition(){
        $max = 0;
        foreach($this->images as $image){
            if($max < $image->posicion){
                $max = $image->posicion;
            }
        }
        return $max;
    }

    public function setImgPrincipal(){
        if($this->img_principal_id = $this->images->sortBy('posicion')->first()){
            $this->img_principal_id = $this->images->sortBy('posicion')->first()->id;
        }else{
            $this->img_principal_id = 0;
        }

        $this->save();
        
    }

    public function setImagePosition($image_id, $avanzar){
        if($avanzar){
            foreach($this->images as $img){
                if($img->id == $image_id){
                        $max = -1;
                        $max_id = $img->id;
                        foreach($this->images as $imgx){
                            if($imgx->posicion < $img->posicion && $imgx->posicion > $max){
                                $max = $imgx->posicion;
                                $max_id = $imgx->id;
                                $max_obj = $imgx;
                            }
                        }
                        if($max == -1){
                            return true;
                        }
                        //dd($min_obj);
                        $var = $img->posicion;
                        $img->posicion = $max_obj->posicion;
                        $max_obj->posicion = $var;
                        $img->save();
                        $max_obj->save();
                        $this->setImgPrincipal();
                        return true;
                        
                    
                }
                
            }
        }else{
            foreach($this->images as $img){
                if($img->id == $image_id){
                        $min = 100;
                        $min_id = $img->id;
                        foreach($this->images as $imgx){
                            if($imgx->posicion > $img->posicion && $imgx->posicion < $min){
                                $min = $imgx->posicion;
                                $min_id = $imgx->id;
                                $min_obj = $imgx;
                            }
                        }
                        if($min == 100){
                            return true;
                        }
                        //dd($min_obj);
                        $var = $img->posicion;
                        $img->posicion = $min_obj->posicion;
                        $min_obj->posicion = $var;
                        $img->save();
                        $min_obj->save();
                        $this->setImgPrincipal();
                        return true;
                        
                    
                }
                
            }
        }
        return true;
    }

    public $timestamps = false;
}
