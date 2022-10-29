<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Persona;
use App\Models\Proveedore;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas = Nota::paginate();
        
        return view('admin.notas.index', compact('notas'))
            ->with('i', (request()->input('page', 1) - 1) * $notas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notas = new Nota();
        $personas=Persona::where('T_E','0')->pluck('nombre','id');
        $proveedores=Proveedore::pluck('nombre','id');
        return view('admin.notas.create', compact('notas','personas','proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Nota::$rules);

         Nota::create($request->all());

        return redirect()->route('admin.notas.index')
            ->with('success', 'Nota created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nota = Nota::find($id);
      
        return view('admin.notas.show', compact('nota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notas = Nota::find($id);
        $personas=Persona::where('T_E','0')->pluck('nombre','id');
        $proveedores=Proveedore::pluck('nombre','id');

        return view('admin.notas.edit', compact('notas','personas','proveedores'));
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
        request()->validate(Nota::$rules);

        $nota=Nota::find($id);
        $nota->update($request->all());

        return redirect()->route('admin.notas.index')
            ->with('success', 'Nota updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nota::find($id)->delete();
        return redirect()->route('admin.notas.index')
            ->with('success', 'Material deleted successfully');
    }
}
