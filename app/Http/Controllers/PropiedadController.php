<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propiedad;

class PropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Propiedad::all();
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
            'destacada'=> 'required',
            'oferta'=> 'required',
            'titulo'=> 'required',
            'status'=> 'required',
            'precio'=> 'required',
            'precioOferta'=> 'required',
            'condVenta'=> 'required',
            'categoria'=> 'required',
            'areaTerreno'=> 'required',
            'direccion'=> 'required',
            'ciudad'=> 'required',
            'estado'=> 'required',
            'CP'=> 'required',
            'fotos'=> 'required',
            'vendedor'=> 'required',
            'moneda'=> 'required'
        ]);
        return Propiedad::create($request->all());
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Propiedad::find($id);
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
        $propiedad = Propiedad::find($id);
        $propiedad ->update($request->all());
        return $propiedad;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Propiedad::destroy($id);
    }

    public function search($name){
        return Propiedad::where('titulo', 'like', '%'.$name.'%')->get();
    }
    public function searchbycategory($categoria){
        return Propiedad::where('categoria', 'like', '%'.$categoria.'%')->get();
    }
}
