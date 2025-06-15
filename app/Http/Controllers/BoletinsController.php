<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBoletimRequest;
use App\Models\Aluno;
use App\Models\Professor;
use App\Models\Boletim;
use App\Models\Materia;

class BoletinsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boletins = Boletim::with(['aluno', 'professor', 'materia'])->get();
        return view("boletins.index", compact("boletins"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materias = Materia::all();
        $professores = Professor::all();
        $alunos = Aluno::all();

        return view('boletins.create', compact('materias', 'professores', 'alunos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBoletimRequest $request)
    {
    
        $boletim = $request->validated();
        Boletim::create($boletim);
        return redirect()->route("boletins.index");
    }

    /**
     * Display the specified resource.
     */

    // Aqui começamos a usar o Route Model Binding, ele faz o trabalho de pesquisar o id
    public function show(Boletim $boletim)
    {
        $boletim->load("aluno", "professor", "materia");
        return view("boletins.show", compact("boletim"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Boletim $boletim)
    {
        $materias = Materia::all();
        $professores = Professor::all();
        $alunos = Aluno::all();

        return view('boletins.edit', compact('boletim', 'materias', 'professores', 'alunos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBoletimRequest $request, Boletim $boletim)
    {
        $data = $request->validated();
        $boletim->update($data);
        return redirect()->route("boletins.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Boletim $boletim)
    {
        $boletim->delete();
        return redirect()->route("boletins.index");
    }
}
