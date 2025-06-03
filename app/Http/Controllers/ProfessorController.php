<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
 
        $professores = Professor::all();
        return view('professores.index', compact('professores'));
    }

    public function create()
    {
        return view('professores.create');
    }

    public function store(Request $request)
    {
        $professor = new Professor([
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email')
        ]);
        $professor-> save();
        return redirect()->route('professores.index');
    }

    public function show(string $id)
    {
        $professor = Professor::findOrFail($id);
        return view('professores.show', ['professor'=> $professor]);
    }

    public function edit(string $id)
    {
        $professor = Professor::findOrFail($id);
        return view('professores.edit', compact('professor'));
    }

    public function update(Request $request, string $id)
    {
        
        $professor->update($professores)
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) 
    {
        //
    }
}
