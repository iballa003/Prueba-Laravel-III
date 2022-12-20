<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use PDF;
use App\Http\Requests\LibrosRequest;
class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listadoPdf()
    {
        $libros = Libro::orderBy('titulo')
            ->get();
        $pdf = PDF::loadView('libros.pdf', compact('libros'));
        return $pdf->download('listado_libros.pdf');
    }
    public function index()
    {
        $libros = Libro::all();
        return view("libros.index",compact("libros"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LibrosRequest $request)
    {
        $validated = $request->validated();
        $datos=$request->all();
        Libro::create($datos);
        return redirect("/libros");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro = Libro::find($id);
        return view('libros.edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(LibrosRequest $request, $id)
    {
        $validated = $request->validated();
        $libro = Libro::find($id);
        $libro->update($request->all());
        return redirect("/libros");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libro = Libro::find($id);
        $libro->delete();
    }
}
