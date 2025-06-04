<?php
<<<<<<< HEAD
namespace App\Http\Controllers;

use App\Models\Professor;
=======

namespace App\Http\Controllers;
>>>>>>> 105855a564a0099631dd7846b99b9c06d967fce7

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
<<<<<<< HEAD
    { 
        $professor =Professor::findOrFail($id);
        $professor->update([
            'nome'=>$request->input('nome'),
            'telefone'=>$request->input('telefone'),
            'email'=>$request->input('email')
        ]);
        return redirect()->route('professores.index');
=======
    {
        
        $professor->update($professores)
>>>>>>> 105855a564a0099631dd7846b99b9c06d967fce7
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
<<<<<<< HEAD
        $professor = Professor::findOrFail($id);
        $professor->delete();
        return redirect()->route('professores.index');
=======
        //
>>>>>>> 105855a564a0099631dd7846b99b9c06d967fce7
    }
}
