<?php

namespace App\Http\Controllers;

use App\Models\Vuelo;
use App\Models\Piloto;
use Illuminate\Http\Request;
use App\Http\Requests\VueloRequest;
class VueloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $vuelos = Vuelo::all();
        return view("vuelos.index",compact("vuelos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vuelos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VueloRequest $request)
    {
        $validated = $request->validated();
        $datos=$request->all();
        Vuelo::create($datos);
        return redirect("/vuelos");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vuelo = Vuelo::find($id);
        return view("vuelos.show",compact("vuelo"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vuelo = Vuelo::find($id);
        $pilotos = Piloto::all();
        return view('vuelos.edit', compact('vuelo','pilotos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function update(VueloRequest $request, $id)
    {
        $validated = $request->validated();
        $vuelo = Vuelo::find($id);
        $vuelo->update($request->all());
        return redirect("/vuelos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vuelo = Vuelo::find($id);
        if ($vuelo) {
            $vuelo->delete();
            return 'ok';
        } else {
            return 'error';
        }
        
    }
}
