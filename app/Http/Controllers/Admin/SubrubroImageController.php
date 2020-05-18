<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Subrubro;
use App\SubrubroImage;
use Image;
use Storage;

class SubrubroImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($subrubro_id, Request $request)
    {   
        
        //dd($request->file('select_file'));

        $rules = [
            'select_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $this->validate($request, $rules);

        $subrubro = Subrubro::find($subrubro_id);

        $image = $request->file('select_file');

        

        $img = Image::make($image);
        $img_width = $img->width();
        $img_height = $img->height();

        if($img_width > $img_height){
            if( $img_width > $img_height * 1.3){
                $img_width = $img_height * 1.3;
            }else{
                $img_height = $img_width / 1.3;
            }            
        }else{
            $img_height = $img_width / 1.3;
        } 
        
        $img = $img->crop(intval($img_width), intval($img_height)); 


        $posicion = $subrubro->getMaxImagePosition() + 1;
        
        $subrubroImage = SubrubroImage::create([
            'subrubro_id' => $subrubro_id,
            'name' => '',
            'posicion' => $posicion,
            ]);
        
            if($subrubro->images->count() == 0){
                $subrubro->img_principal_id = $subrubroImage->id;
                $subrubro->save();
            } 

        $name = $subrubro->slug . '_'. $subrubro->id . '-' .$subrubroImage->id.  '.' . $image->getClientOriginalExtension();

        try {
            //Guardo el original
            $destinationPath = public_path('/images/originals/') . $name;
            $img->save($destinationPath);

            //Guardo el principal
            $destinationPath = public_path('/images/') . $name;
            $img->save($destinationPath, 40);

            //Guardo el thumbnail
            $destinationPath = public_path('/images/thumbnails/') . $name;
            $img->save($destinationPath, 20);

            $subrubroImage->name = $name;
            $subrubroImage->save();


        } catch (Exception $e) {
            $stockproductImage->delete();

        }
        
        return redirect()->route('subrubros.edit', $subrubro_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_subrubro, $id)
    {
        $img = SubrubroImage::find($id);
        $name = $img->name;
        $img->delete();
        //Storage::delete(public_path('/images/originals/') . $name);
        //Storage::delete(public_path('/images/thumbnails/') . $name);
        //Storage::delete(public_path('/images/') . $name);

        Subrubro::find($id_subrubro)->setImgPrincipal();

        return back()->with('success', 'Eliminado correctamente.');
    }

    public function setPositionfor($id_subrubro, $id){
        $subrubro = Subrubro::find($id_subrubro);
        $subrubro->setImagePosition($id, true);
        
        return back()->with('success', 'Se há modificado correctamente.');
    }

    public function setPositionback($id_subrubro, $id){
        $subrubro = Subrubro::find($id_subrubro);
        $subrubro->setImagePosition($id, false);
        
        return back()->with('success', 'Se há modificado correctamente.');
    }
}
