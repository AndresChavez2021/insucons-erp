<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proveedore;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedore::paginate();

         return view('admin.proveedores.index', compact('proveedores'))
             ->with('i', (request()->input('page', 1) - 1) * $proveedores->perPage());
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $proveedore = new Proveedore();
        return view('admin.proveedores.create', compact('proveedore'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //request()->validate(Proveedore::$rules);
        $request->validate([
        'nit' => 'required|unique:proveedores', // validar datos unicos
		'nombre' => 'required',
		'telefono' => 'required',
		'direccion' => 'required',
        ]);
         Proveedore::create($request->all());

        return redirect()->route('admin.proveedores.index')
            ->with('success', 'Proveedore created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedore = Proveedore::find($id);

        return view('admin.proveedores.show', compact('proveedore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedore = Proveedore::find($id);

        return view('admin.proveedores.edit', compact('proveedore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedore $proveedore)
    {
        $request->validate([
            'nit' => 'required', // validar datos unicos
            'nombre' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            ]);
        $proveedore->update($request->all());

        return redirect()->route('admin.proveedores.index')
            ->with('success', 'Proveedore updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Proveedore::find($id)->delete();

        return redirect()->route('admin.proveedores.index')
            ->with('success', 'Proveedore deleted successfully');
    }
}
