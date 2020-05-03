<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use App\Subrubro;

class CategoryController extends Controller
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
        return view('admin.categories.index');
    }

    public function list(Request $request){
        $query = trim($request->get('searchText'));
        $val = explode(' ', $query );
        $atr = [];
        foreach ($val as $q) {
            array_push($atr, ['name', 'ILIKE', '%'.$q.'%'] );
        };

        $cantidad = 10;
        if($request->has('cantidad')){
            $cantidad = $request->get('cantidad');
        }
        
        $categories = Category::orderBy('name', 'ASC')
            ->where($atr)
            ->paginate($cantidad);
        
        return [
            'pagination' => [
                'total'         => $categories->total(),
                'current_page'  => $categories->currentPage(),
                'per_page'      => $categories->perPage(),
                'last_page'     => $categories->lastPage(),
                'from'          => $categories->firstItem(),
                'to'            => $categories->lastItem(),
            ],
            'items' => $categories
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $subrubros = Subrubro::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.categories.create', compact('subrubros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:categories,name',
            'slug' => 'required|unique:categories,slug',
        ];
        $messages = [
            'name.required' => 'El campo Nombre no puede quedar vacío.',
            'name.unique' => 'Existe una Categoría con el mismo nombre.',
            'slug.required' => 'El campo URL no puede quedar vacío.',
            'slug.unique' => 'Existe una Categoría con el mismo URL.',
        ];
        $this->validate($request, $rules, $messages);

        $category = Category::create($request->all());

        session()->flash('success', 'El Registro se ha creado satisfactoriamente.');
        return redirect()->route('categories.edit', [$category->id]);
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
        $subrubros = Subrubro::orderBy('name', 'ASC')->pluck('name', 'id');
        $category = Category::find($id);

        $request->session()->keep(['success']);
        return view('admin.categories.edit', compact('category', 'subrubros'));
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
            'name' => 'required|unique:categories,name,'.$id,
            'slug' => 'required|unique:categories,slug,'.$id,
        ];
        $messages = [
            'name.required' => 'El campo Nombre no puede quedar vacío.',
            'name.unique' => 'Existe una Categoría con el mismo nombre.',
            'slug.required' => 'El campo URL no puede quedar vacío.',
            'slug.unique' => 'Existe una Categoría con el mismo URL.',
        ];
        $this->validate($request, $rules, $messages);

        $categorie = Category::find($id);

        $categorie->fill($request->all())->save();

        session()->flash('success', 'El Registro se ha actualizado satisfactoriamente.');
        return redirect()->route('categories.edit', $categorie->id);
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
