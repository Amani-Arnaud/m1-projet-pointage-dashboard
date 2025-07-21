@extends('layouts.app')
@section('content')
<h2>Gestion des agents</h2>
<a href="{{ route('agents.create') }}" class="btn btn-primary mb-3">Ajouter un agent</a>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Matricule</th>
            <th>Poste</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($agents as $agent)
        <tr>
            <td>{{ $agent->Nom }} {{ $agent->Prenom }}</td>
            <td>{{ $agent->Matricule }}</td>
            <td>{{ $agent->parcours }}</td>
            <td>
                <a href="{{ route('agents.edit', $agent->id_agent) }}" class="btn btn-sm btn-warning">Modifier</a>
                <form action="{{ route('agents.destroy', $agent->id_agent) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cet agent ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
