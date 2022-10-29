<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materialservicio;
use App\Models\Servicio;
use App\Models\Materiale;

class MaterialservicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Materialservicio::paginate();
        $materiales= Materiale::pluck('nombre','id');
        $servicios= Servicio::pluck('nombre','id');

        return view('admin.materialservicios.index', compact('items','materiales','servicios'))
            ->with('i', (request()->input('page', 1) - 1) * $items->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = new Materialservicio();
        $materiales= Materiale::pluck('nombre','id');
        $servicios= Servicio::pluck('nombre','id');
        return view('admin.materialservicios.create', compact('items','materiales','servicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Materialservicio::$rules);

         Materialservicio::create($request->all());

        return redirect()->route('admin.items.index')
            ->with('success', 'item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Materialservicio::find($id);

        return view('admin.materialservicios.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Materialservicio::find($id);
        $materiales= Materiale::pluck('nombre','id');//consulta la base de datos utilizando nombre y id
        $servicios= Servicio::pluck('nombre','id');
        return view('admin.materialservicios.edit', compact('items','materiales','servicios'));
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
         $item=Materialservicio::find($id);
        $item->update($request->all());

        return redirect()->route('admin.items.index')
            ->with('success', 'item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Materialservicio::find($id)->delete();

        return redirect()->route('admin.items.index')
            ->with('success', 'item deleted successfully');
    }
}
