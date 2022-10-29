<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cargo;
use App\Models\Persona;
use App\Models\Cargoempleado;

class CargoempleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cargoempleados = Cargoempleado::paginate();
       // $personas=Persona::where('T_E','0')->pluck('nombre','id');
        $personas= Persona::select('nombre','id')->where('T_E','0')->get();//  ojo revisar :v 
        $cargos=Cargo::all(); 
      //$cargo=Cargo::pluck('nombre','id'); 
        return view('admin.cargoempleados.index', compact('personas','cargos','cargoempleados'))
        ->with('i', (request()->input('page', 1) - 1) * $cargoempleados->perPage());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cargoempleado = new Cargoempleado();
        //$persona= Persona::select('nombre','id')->where('T_E','0')->get();
        $personas=Persona::where('T_E','0')->pluck('nombre','id');
        $cargos=Cargo::pluck('nombre','id'); 
        return view('admin.cargoempleados.create', compact('cargoempleado','personas','cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cargoempleado::$rules);

      Cargoempleado::create($request->all());

        return redirect()->route('admin.contratos.index')
            ->with('success', 'Cargoempleado created successfully.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //hacer una mejor consulta y mandarlo desde aqui para mostrar
        $cargoempleado = Cargoempleado::find($id);
        $personas= Persona::select('nombre','id')->where('T_E','0')->get();//  ojo revisar :v 
        $cargos=Cargo::all(); 

        return view('admin.cargoempleados.show', compact('cargoempleado','personas','cargos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cargoempleado = Cargoempleado::find($id);
        $personas=Persona::where('T_E','0')->pluck('nombre','id');
        $cargos=Cargo::pluck('nombre','id'); 

        return view('admin.cargoempleados.edit', compact('cargoempleado','personas','cargos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cargoempleado $cargoempleado)
    {
        request()->validate(Cargoempleado::$rules);

        $cargoempleado->update($request->all());

        return redirect()->route('admin.contratos.index')
            ->with('success', 'Cargoempleado updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cargoempleado::find($id)->delete();

        return redirect()->route('admin.contratos.index')
            ->with('success', 'Cargoempleado deleted successfully');
    }
}
