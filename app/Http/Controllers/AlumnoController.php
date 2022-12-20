<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use PDF;
use App\Http\Requests\AlumnoRequest;
class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listadoPdf()
    {
        $alumnos = Alumno::orderBy('nombre')
            ->get();
        $pdf = PDF::loadView('alumnos.pdf', compact('alumnos'));
        return $pdf->download('listado_alumnos.pdf');
    }
    public function index()
    {
        $alumnos = Alumno::all();
        return view("alumnos.index",compact("alumnos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoRequest $request)
    {
        $validated = $request->validated();
        $datos=$request->all();
        Alumno::create($datos);
        return redirect("/alumnos");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumno::find($id);
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(AlumnoRequest $request, $id)
    {
        $validated = $request->validated();
        $alumno = Alumno::find($id);
        //$alumno->f_nacimiento = date('d-m-Y', strtotime($alumno->f_nacimiento));
        $alumno->update($request->all());
        return redirect("/alumnos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno = Alumno::find($id);
        $alumno->delete();
    }
}
