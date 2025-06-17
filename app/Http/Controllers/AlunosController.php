<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlunoRequest;
use App\Http\Requests\StoreDataRequest;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Services\ImageUpload;
use Illuminate\Support\Str; 
class AlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alunos = Aluno::all();
        return view("alunos.index", compact("alunos"));
    }

    /**
     * Show the form for creating a new resource.
     */ 
    public function create()
    {
        return view("alunos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlunoRequest $request, ImageUpload $imagem)
    {
        $daodsValidados= $request->validated();
        $aluno = Aluno::create($daodsValidados);
        $aluno->image = $imagem->SaveImage($request,$aluno->id,"Alunos");;
        $aluno->save();
        return redirect()->route("alunos.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aluno= Aluno::findOrFail($id);
        return view("alunos.show",['aluno'=> $aluno]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aluno= Aluno::findOrFail($id);
        return view("alunos.edit",compact("aluno"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAlunoRequest $request,Aluno $aluno)
    {   
        $data= $request->validated();
        $aluno->update($data);
        return redirect()->route("alunos.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();
        return redirect()->route("alunos.index");
    }
}
