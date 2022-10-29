<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Marca;
use Illuminate\Http\Request;
use App\Models\Materiale;
use App\Models\Medida;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiales = Materiale::paginate();

        return view('admin.materiales.index', compact('materiales'))
            ->with('i', (request()->input('page', 1) - 1) * $materiales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materiales = new Materiale();
        $marcas= Marca::pluck('nombre','id');//consulta la base de datos utilizando nombre y id
        $medidas= Medida::pluck('unidad','id');//consulta la base de datos utilizando nombre y id
        return view('admin.materiales.create', compact('materiales','marcas','medidas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Materiale::$rules);

        Materiale::create($request->all());

        return redirect()->route('admin.materiales.index')
            ->with('success', 'Material created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materiales = Materiale::find($id);
        // $marcas= Marca::pluck('nombre','id');//consulta la base de datos utilizando nombre y id
        // $medidas= Medida::pluck('unidad','id');
        return view('admin.materiales.show', compact('materiales'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materiales = Materiale::find($id);
        $marcas= Marca::pluck('nombre','id');//consulta la base de datos utilizando nombre y id
        $medidas= Medida::pluck('unidad','id');
        return view('admin.materiales.edit', compact('materiales','marcas','medidas'));
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
         request()->validate(Materiale::$rules);
         $material=Materiale::find($id);
        $material->update($request->all());

        return redirect()->route('admin.materiales.index')
            ->with('success', 'material updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Materiale::find($id)->delete();

        return redirect()->route('admin.materiales.index')
            ->with('success', 'Material deleted successfully');
    }
}
