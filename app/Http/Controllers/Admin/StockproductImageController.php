<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\StockproductImage;
use App\Stockproduct;
use Image;
use Storage;

class StockproductImageController extends Controller
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
    public function store($stockproduct_id, Request $request)
    {   
        
        //dd($request->file('select_file'));

        $rules = [
            'select_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $this->validate($request, $rules);

        $stockproduct = Stockproduct::find($stockproduct_id);

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

        // resize the image to a width of 300 and constrain aspect ratio (auto height)
        $img = $img->resize(780, null, function ($constraint) {
                $constraint->aspectRatio();
            });


        $posicion = $stockproduct->getMaxImagePosition() + 1;

        $stockproductImage = StockproductImage::create([
            'stockproduct_id' => $stockproduct_id,
            'name' => '',
            'posicion' => $posicion,
            ]);
        
            if($stockproduct->images->count() == 0){
                $stockproduct->img_principal_id = $stockproductImage->id;
                $stockproduct->save();
            } 

        $name = $stockproduct->slug . '_'. $stockproduct->id . '-' .$stockproductImage->id.  '.' . $image->getClientOriginalExtension();

        try {
            //Guardo el original
            $destinationPath = public_path('/images/originals/') . $name;
            $img->save($destinationPath);

            //Guardo el principal
            $destinationPath = public_path('/images/') . $name;
            $img->save($destinationPath, 80);

            //Guardo el thumbnail
            $destinationPath = public_path('/images/thumbnails/') . $name;
            $img->save($destinationPath, 50);

            $stockproductImage->name = $name;
            $stockproductImage->save();


        } catch (Exception $e) {
            $stockproductImage->delete();

        }
        
        return redirect()->route('stockproducts.edit', $stockproduct_id);

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
    public function destroy($id_stockproduct, $id)
    {
        $img = StockproductImage::find($id);
        $name = $img->name;
        $img->delete();
        //Storage::delete(public_path('/images/originals/') . $name);
        //Storage::delete(public_path('/images/thumbnails/') . $name);
        //Storage::delete(public_path('/images/') . $name);

        Stockproduct::find($id_stockproduct)->setImgPrincipal();

        return back()->with('success', 'Eliminado correctamente.');
    }

    public function setPositionfor($id_stockproduct, $id){
        $stockproduct = Stockproduct::find($id_stockproduct);
        $stockproduct->setImagePosition($id, true);
        
        return back()->with('success', 'Se há modificado correctamente.');
    }

    public function setPositionback($id_stockproduct, $id){
        $stockproduct = Stockproduct::find($id_stockproduct);
        $stockproduct->setImagePosition($id, false);
        
        return back()->with('success', 'Se há modificado correctamente.');
    }
}
