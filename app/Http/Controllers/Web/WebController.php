<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Stockproduct;
use App\Category;
use App\Subrubro;
use App\Rubro;

class WebController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $rubros = Rubro::orderBy('name', 'ASC')->get();

        $destacados = Stockproduct::all()
            ->where('web_enable', '=', 'true')
            ->random(6);
        
        return view('web.index', [
            'rubros' => $rubros,
            'destacados' => $destacados
            ]);
    }

    public function contact(){
        $rubros = Rubro::orderBy('name', 'ASC')->get();
        
        return view('web.contact.contact', [
            'rubros' => $rubros,
            ]);
    }
    public function send_email_ajax(Request $request){

    }
    public function producto($slug)
    {

        $stockproduct = StockProduct::where('slug', '=', $slug)->first();
        

        $rubros = Rubro::orderBy('name', 'ASC')->get();
        
        return view('web.producto', [
            'stockproduct' => $stockproduct,
            'rubros' => $rubros,
            'rubro_id' => $stockproduct->category->subrubro->rubro->id,
            ]);
    }

    public function category($slug)
    {

        $category = Category::where('slug', '=', $slug)->first();
        
        $rubros = Rubro::orderBy('name', 'ASC')->get();
        
        return view('web.category', [
            'category' => $category,
            'rubros' => $rubros,
            'rubro_id' => $category->subrubro->rubro->id,
            ]);
    }
    public function subrubro($slug)
    {

        $subrubro = Subrubro::where('slug', '=', $slug)->first();
        
        $rubros = Rubro::orderBy('name', 'ASC')->get();
        
        return view('web.subrubro', [
            'subrubro' => $subrubro,
            'rubros' => $rubros,
            'rubro_id' => $subrubro->rubro->id,
            ]);
    }
    public function rubro($slug)
    {

        $rubro = Rubro::where('slug', '=', $slug)->first();
        

        $rubros = Rubro::orderBy('name', 'ASC')->get();
       
        
        return view('web.rubro', [
            'rubro' => $rubro,
            'rubros' => $rubros,
            'rubro_id' => $rubro->id,
            ]);
    }

    public function search(Request $request)
    {
        $query = trim($request->get('q'));        

        $rubros = Rubro::orderBy('name', 'ASC')->get();
        
        return view('web.search', [
            'rubros' => $rubros,
            'q' => $query
            ]);
    }

    public function search_ajax(Request $request)
    {
        $query = trim($request->get('q'));
        $val = explode(' ', $query );
        $atr = [];
        foreach ($val as $q) {
            array_push($atr, ['stockproducts.name', 'ILIKE', '%'.$q.'%'] );
        };

        $stockproducts =DB::table('stockproducts')
            ->where($atr)
            ->join('categories','stockproducts.category_id', '=', 'categories.id')
            ->leftJoin('stockproduct_images', 'stockproducts.img_principal_id', '=', 'stockproduct_images.id')
            
            ->select(
                'stockproducts.id','stockproducts.name','stockproducts.slug',
                'categories.name as category_name', 'categories.slug as category_slug',
                'stockproduct_images.name as img' 
                )
            
            ->paginate(6);
        return [
            'items'         => $stockproducts,
            'last_page'     => $stockproducts->lastPage(),
            ];
        
    }

    
    

}