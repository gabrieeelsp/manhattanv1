<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Stockproduct;
use App\Category;

class StockproductController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.stockproducts.index');
    }

    public function list(Request $request){
        $query = trim($request->get('searchText'));
        $val = explode(' ', $query );
        $atr = [];
        foreach ($val as $q) {
            array_push($atr, ['name', 'LIKE', '%'.strtolower($q).'%'] );
        };

        $cantidad = 5;
        if($request->has('cantidad')){
            $cantidad = $request->get('cantidad');
        }
        
        $stockproducts = Stockproduct::orderBy('name', 'ASC')
            ->where($atr)
            ->paginate($cantidad);
        
        return [
            'pagination' => [
                'total'         => $stockproducts->total(),
                'current_page'  => $stockproducts->currentPage(),
                'per_page'      => $stockproducts->perPage(),
                'last_page'     => $stockproducts->lastPage(),
                'from'          => $stockproducts->firstItem(),
                'to'            => $stockproducts->lastItem(),
            ],
            'items' => $stockproducts
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.stockproducts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->exists('web_enable')){
            $request->request->add(['web_enable' => 0]);
        }
        $rules = [
            'name' => 'required|unique:rubros,name',
            'slug' => 'required|unique:rubros,slug',
        ];
        $messages = [
            'name.required' => 'El campo Nombre no puede quedar vacío.',
            'name.unique' => 'Existe un Producto Stock con el mismo nombre.',
            'slug.required' => 'El campo URL no puede quedar vacío.',
            'slug.unique' => 'Existe un Producto Stock con el mismo URL.',
        ];
        $this->validate($request, $rules, $messages);

        $stockproduct = Stockproduct::create($request->all());

        session()->flash('success', 'El Registro se ha creado satisfactoriamente.');
        return redirect()->route('stockproducts.edit', [$stockproduct->id]);
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
    public function edit(Request $request, $id)
    {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');

        $stockproduct = Stockproduct::find($id);

        $request->session()->keep(['success']);
        return view('admin.stockproducts.edit', compact('stockproduct', 'categories'));
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
        
        if(!$request->exists('web_enable')){
            $request->request->add(['web_enable' => 0]);
        }
        $rules = [
            'name' => 'required|unique:stockproducts,name,'.$id,
            'slug' => 'required|unique:stockproducts,slug,'.$id,
        ];
        $messages = [
            'name.required' => 'El campo Nombre no puede quedar vacío.',
            'name.unique' => 'Existe un Producto Stock con el mismo nombre.',
            'slug.required' => 'El campo URL no puede quedar vacío.',
            'slug.unique' => 'Existe un Producto Stock con el mismo URL.',
        ];
        $this->validate($request, $rules, $messages);

        $stockproduct = Stockproduct::find($id);

        $stockproduct->fill($request->all())->save();

        session()->flash('success', 'El Registro se ha actualizado satisfactoriamente.');
        return redirect()->route('stockproducts.edit', $stockproduct->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
