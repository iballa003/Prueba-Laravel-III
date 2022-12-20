<?php

namespace App\Http\Controllers;

use App\Models\Piloto;
use Illuminate\Http\Request;

class PilotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listadoVuelos($id)
    {
        $piloto = Piloto::find($id);
        $vuelos = Piloto::find($id)->vuelos;
        return view("pilotos.vuelos",compact("vuelos","piloto"));
    }
    public function index()
    {
        $pilotos = Piloto::all();
        return view("pilotos.index",compact("pilotos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pilotos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos=$request->all();
        Piloto::create($datos);
        return redirect("/pilotos");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Piloto  $piloto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Piloto  $piloto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $piloto = Piloto::find($id);
        return view('pilotos.edit', compact('piloto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Piloto  $piloto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $piloto = Piloto::find($id);
        $piloto->update($request->all());
        return redirect("/pilotos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Piloto  $piloto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Piloto $piloto)
    {
        //
    }
}
