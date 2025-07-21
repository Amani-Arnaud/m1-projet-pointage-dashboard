@extends('layouts.app')
@section('content')
<h2>Historique des pointages</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Type</th>
            <th>Date Arrivée</th>
            <th>Statut</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pointages as $pt)
        <tr>
            <td>{{ $pt->agent->Nom }} {{ $pt->agent->Prenom }}</td>
            <td>{{ $pt->type_pointage }}</td>
            <td>{{ $pt->date_pointage }}</td>
            <td>{{ $pt->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
