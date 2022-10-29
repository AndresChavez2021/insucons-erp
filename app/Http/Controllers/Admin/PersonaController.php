<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::paginate();

        return view('admin.personas.index', compact('personas'))
            ->with('i', (request()->input('page', 1) - 1) * $personas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $persona = new Persona();
        return view('admin.personas.create', compact('persona'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ci'=>'required',
            'apellido_paterno'=>'required',
            'apellido_materno'=>'required',
            'nombre' => 'required',
            'telefono'=>'required',
            'direccion'=>'required',
            'nit'=>'required',
            'tipo'=>'required',
            'fecha_nacimiento'=>'required',
            'sueldo'=>'required',
		     'T_C' => 'required',
		     'T_E' => 'required',
        ]);

        $persona = Persona::create($request->all());

        return redirect()->route('admin.personas.index')
            ->with('success', 'Persona created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona = Persona::find($id);

        return view('admin.personas.show', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona = Persona::find($id);

        return view('admin.personas.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'ci'=>'required',
            'apellido_paterno'=>'required',
            'apellido_materno'=>'required',
            'nombre' => 'required',
            'telefono'=>'required',
            'direccion'=>'required',
            'nit'=>'required',
            'tipo'=>'required',
            'fecha_nacimiento'=>'required',
            'sueldo'=>'required',
		     'T_C' => 'required',
		     'T_E' => 'required',
        ]);

        $persona->update($request->all());

        return redirect()->route('admin.personas.index')
            ->with('success', 'Persona updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Persona::find($id)->delete();

        return redirect()->route('admin.personas.index')
            ->with('success', 'Persona deleted successfully');
    }
}
