<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBoletimRequest;
use App\Http\Requests\StoreProfessor_Materia;
use App\Models\Professor;
use App\Models\Materia;
use App\Models\Professor_Materia;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class Professores_Materias extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professores_materias= Professor_Materia::with(["professor","materia"])->get();
        return view("professores_materias.index",compact("professores_materias"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $professores= Professor::all();
        $materias =Materia::all();
        
        return view("professores_materias.create",compact("professores","materias"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfessor_Materia $request)
    {
        $data= $request->validated();
        
        Professor_Materia::create($data);
        return redirect()->route("professores_materias.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Professor_Materia $professores_materia)
    {
        $professores_materia->load(["professor","materia"]);
        return view("professores_materias.show",compact("professores_materia"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Professor_Materia $professores_materia)
    {
        $materias= Materia::all();
        $professores= Professor::all();
        return view("professores_materias.edit",compact("materias","professores","professores_materia"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProfessor_Materia $request, Professor_Materia $professores_materia)
    {
        $data= $request->validated();
        $professores_materia->update($data);
        return redirect()->route("professores_materias.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professor_Materia $professores_materia)
    {
        $professores_materia->delete();
        return redirect()->route("professores_materias.index");
    }
}
