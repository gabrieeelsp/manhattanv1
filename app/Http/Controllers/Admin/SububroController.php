<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Subrubro;
use App\Rubro;

class SubrubroController extends Controller
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
        return view('admin.subrubros.index');
    }

    public function list(Request $request){
        $query = trim($request->get('searchText'));
        $val = explode(' ', $query );
        $atr = [];
        foreach ($val as $q) {
            array_push($atr, ['name', 'LIKE', '%'.strtolower($q).'%'] );
        };

        $cantidad = 10;
        if($request->has('cantidad')){
            $cantidad = $request->get('cantidad');
        }
        
        $subrubros = Subrubro::orderBy('name', 'ASC')
            ->where($atr)
            ->paginate($cantidad);
        
        return [
            'pagination' => [
                'total'         => $subrubros->total(),
                'current_page'  => $subrubros->currentPage(),
                'per_page'      => $subrubros->perPage(),
                'last_page'     => $subrubros->lastPage(),
                'from'          => $subrubros->firstItem(),
                'to'            => $subrubros->lastItem(),
            ],
            'items' => $subrubros
        ];
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $rubros = Rubro::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.subrubros.create', compact('rubros'));
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
            'name' => 'required|unique:subrubros,name',
            'slug' => 'required|unique:subrubros,slug',
        ];
        $messages = [
            'name.required' => 'El campo Nombre no puede quedar vacío.',
            'name.unique' => 'Existe un SubRubro con el mismo nombre.',
            'slug.required' => 'El campo URL no puede quedar vacío.',
            'slug.unique' => 'Existe un SubRubro con el mismo URL.',
        ];
        $this->validate($request, $rules, $messages);

        $subrubro = Subrubro::create($request->all());

        session()->flash('success', 'El Registro se ha creado satisfactoriamente.');
        return redirect()->route('subrubros.edit', [$subrubro->id]);
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
        $rubros = Rubro::orderBy('name', 'ASC')->pluck('name', 'id');
        $subrubro = Subrubro::find($id);

        $request->session()->keep(['success']);
        return view('admin.subrubros.edit', compact('subrubro', 'rubros'));
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
            'name' => 'required|unique:subrubros,name,'.$id,
            'slug' => 'required|unique:subrubros,slug,'.$id,
        ];
        $messages = [
            'name.required' => 'El campo Nombre no puede quedar vacío.',
            'name.unique' => 'Existe un Sub Rubro con el mismo nombre.',
            'slug.required' => 'El campo URL no puede quedar vacío.',
            'slug.unique' => 'Existe un Sub Rubro con el mismo URL.',
        ];
        $this->validate($request, $rules, $messages);

        $subrubro = Subrubro::find($id);

        $subrubro->fill($request->all())->save();

        session()->flash('success', 'El Registro se ha actualizado satisfactoriamente.');
        return redirect()->route('subrubros.edit', $subrubro->id);
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
