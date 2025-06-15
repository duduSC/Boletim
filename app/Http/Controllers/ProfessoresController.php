<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfessorRequest;
use Illuminate\Http\Request;
use App\Models\Professor;
use App\Services\ImageUpload;

class ProfessoresController extends Controller
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

    public function store(StoreProfessorRequest $request,ImageUpload $imagem)
    {
        $professor= $request->validated();
        $professor= Professor::create(attributes: $professor);
        $professor->image = $imagem->SaveImage($request,$professor->id,"professores");;
        $professor->save();
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
        $professor= Professor::findOrFail($id);    
        $professor->update($request->all());
        return view('professores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) 
    {
        $professor = Professor::findOrFail($id);
        $professor->delete();
        return redirect()->route("professores.index");
    }
}
