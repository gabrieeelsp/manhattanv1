<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Stockproduct;
use App\Category;
use App\Subrubro;
use App\Rubro;

use App\Mail\MessageReceived;

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
            ->where('web_enable', '=', 1)
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
    public function contact_product($id){
        $rubros = Rubro::orderBy('name', 'ASC')->get();

        $stockproduct = Stockproduct::find($id);

        if (!$stockproduct) {
            abort(404);
        }

        $asunto = "Consulta de producto, $stockproduct->name";
        
        $mensaje = "Estoy interesado en el producto:\n".
            "Código: " . $stockproduct->id. "\n".
            "Nombre: " . $stockproduct->name. "\n".
            "Comentario: ";
        
        return view('web.contact.contact', [
            'rubros' => $rubros,
            'asunto' => $asunto,
            'mensaje' => $mensaje,  
            ]);
    }
    public function send_mail(Request $request){
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'message' => 'required',
        ];
        $messages = [
            'name.required' => 'El campo Nombre no puede quedar vacío.',
            'phone.required' => 'El campo Teléfono no puede quedar vacío.',
            'email.required' => 'El campo Email no puede quedar vacío.',
            'message.required' => 'El campo Mensaje no puede quedar vacío.',
        ];
        $message = request()->validate($rules, $messages);

        Mail::to('ventas@plastitodo.com.ar')->queue(new MessageReceived($message));
        
        return "Mensaje Enviado";
    }
    public function producto($slug)
    {

        $stockproduct = StockProduct::where('slug', '=', $slug)->first();
        
        if (!$stockproduct) {
            abort(404);
        }

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

        if (!$category) {
            abort(404);
        }
        
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

        if (!$subrubro) {
            abort(404);
        }
        
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
        
        if (!$rubro) {
            abort(404);
        }

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
            array_push($atr, ['stockproducts.name', 'LIKE', '%'.strtolower($q).'%'] );
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
