<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    //
    public function index()
    {
        $agents = Agent::all();
        return view('agents.index', compact('agents'));
    }

    public function create()
    {
        return view('agents.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'Nom' => 'required',
            'Prenom' => 'required',
            'Matricule' => 'required|unique:agents,Matricule',
            'parcours' => 'required'
        ]);

        $data = $request->except('_token'); // exclure le champ CSRF
        
        Agent::create($data);
        return redirect()->route('agents.index')->with('success', 'Agent ajouté avec succès.');
    }

    public function edit(Agent $agent)
    {
        return view('agents.edit', compact('agent'));
    }

    public function update(Request $request, Agent $agent)
    {
       
        $request->validate([
            'Nom' => 'required',
            'Prenom' => 'required',
            'Matricule' => 'required',
            'parcours' => 'required'
        ]);

        $agent->update($request->all());
        return redirect()->route('agents.index')->with('success', 'Agent modifié avec succès.');
    }

    public function destroy(Agent $agent)
    {
        $agent->delete();
        return redirect()->route('agents.index')->with('success', 'Agent supprimé avec succès.');
    }

    public function getVar() {
        $users = Agent::get();
        return response()->json($users);
    }

}
