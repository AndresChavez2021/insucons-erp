<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servicio;

class ServioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Servicio::paginate();

        return view('admin.servicios.index', compact('servicios'))
            ->with('i', (request()->input('page', 1) - 1) * $servicios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicios= new Servicio();
        return view('admin.servicios.create', compact('servicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Servicio::$rules);

        Servicio::create($request->all());

        return redirect()->route('admin.servicios.index')
            ->with('success', 'Servicio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicios = Servicio::find($id);

        return view('admin.servicios.show', compact('servicios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicios= Servicio::find($id);

        return view('admin.servicios.edit', compact('servicios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicio $servicios)
    {
        request()->validate(Servicio::$rules);

        $servicios->update($request->all());

        return redirect()->route('admin.servicios.index')
            ->with('success', 'Servicio updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Servicio::find($id)->delete();

        return redirect()->route('admin.servicios.index')
            ->with('success', 'Servicio deleted successfully');
    }
}
