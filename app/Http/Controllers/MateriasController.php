<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;
class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias= materias::all();
        return view("materiases.index",compact("materias"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("materiases.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $materias= new materias([
            "nome" => $request->input("nome"),
            "telefone"=> $request->input("telefone"),
            "email"=> $request->input("email")
        ]);
        $materias->save();
        return redirect()->route("materiases.index");
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $materias= materias::findOrFail($id);
        return view("materiases.show",compact("materias"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $materias= disciplinas::findOrFail($id);
        return view("disciplinases.edit",compact("disciplinas"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $professor= Professor::findOrFail($id);
        $professor->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
