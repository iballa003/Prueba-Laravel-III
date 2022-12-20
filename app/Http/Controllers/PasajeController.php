<?php

namespace App\Http\Controllers;

use App\Models\Pasaje;
use App\Models\Vuelo;
use Illuminate\Http\Request;

class PasajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sumar($id)
    {
        $pasaje = Pasaje::find($id);
        $pasaje->precio++;
        $pasaje->save();
        return redirect("/pasajes");
    }
    public function restar($id)
    {
        $pasaje = Pasaje::find($id);
        $pasaje->precio--;
        $pasaje->save();
        return redirect("/pasajes");
    }
    public function index()
    {
        $pasajes = Pasaje::all();
        return view("pasajes.index",compact("pasajes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasajes.create');
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
        Pasaje::create($datos);
        return redirect("/pasajes");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasaje  $pasaje
     * @return \Illuminate\Http\Response
     */
    public function show(Pasaje $pasaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasaje  $pasaje
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vuelos = Vuelo::all();
        $pasaje = Pasaje::find($id);
        return view('pasajes.edit', compact('pasaje','vuelos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasaje  $pasaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pasaje = Pasaje::find($id);
        $pasaje->update($request->all());
        return redirect("/pasajes");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasaje  $pasaje
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasaje = Pasaje::find($id);
        $pasaje->delete();
    }
}
