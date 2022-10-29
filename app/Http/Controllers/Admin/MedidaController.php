<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medida;

class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $medidas = Medida::paginate();

        return view('admin.medidas.index', compact('medidas'))
            ->with('i', (request()->input('page', 1) - 1) * $medidas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medidas = new Medida();
        return view('admin.medidas.create', compact('medidas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Medida::$rules);

         Medida::create($request->all());

        return redirect()->route('admin.medidas.index')
            ->with('success', 'Medida created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medidas = Medida::find($id);

        return view('admin.medidas.show', compact('medidas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medidas= Medida::find($id);

        return view('admin.medidas.edit', compact('medidas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medida $medida)
    {
        request()->validate(Medida::$rules);

        $medida->update($request->all());

        return redirect()->route('admin.medidas.index')
            ->with('success', 'Medida updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medida::find($id)->delete();

        return redirect()->route('admin.medidas.index')
            ->with('success', 'Medida deleted successfully');
    }
}
