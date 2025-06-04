<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias= Materia::all();
        return view("materias.index",compact("materias"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("materias.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $materias= new Materia([
            "nome" => $request->input("nome"),
            "carga_horaria"=> $request->input("carga_horaria"),
        ]);
        $materias->save();
        return redirect()->route("materias.index");
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $materia= Materia::findOrFail($id);
        return view("materias.show",compact("materia"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $materia= Materia::findOrFail($id);
        return view("materias.edit",compact("materia"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $materia= Materia::findOrFail($id);
        $materia->update($request->all());
        return view("materias.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materia = Materia::findOrFail($id);
        $materia->delete();
        return redirect()->route("materias.index");
    }
}
