@extends('layouts.app')
@section('content')
<h2>Paramètres généraux</h2>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form action="{{ route('parametres.update') }}" method="POST">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @csrf
    <div class="mb-3">
        <label class="form-label">Nom entreprise </label>
        <input type="text" name="nom_entreprise" value="{{ old('nom_entreprise', $param->nom_entreprise ?? '') }}" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Heure d'arrivée standard</label>
        <input type="time" name="heure_arrivee" value="{{ old('heure_arrivee', $param->heure_arrivee ?? '08:00') }}" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Heure de départ standard</label>
        <input type="time" name="heure_depart" value="{{ old('heure_depart', $param->heure_depart ?? '17:00') }}" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Marge retard (en minute)</label>
        <input type="number" name="marge_arrivee" value="{{ old('marge_arrivee', $param->marge_arrivee ?? '') }}" class="form-control">
    </div>
    <div class="mb-3">
        <h4>
            Position de l'entreprise
        </h4>
    </div>
    <div class="mb-3">
        <label class="form-label">Latitude</label>
        <input type="text" name="latitude_entreprise" value="{{ old('latitude_entreprise', $param->latitude_entreprise ?? '') }}" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Longitude</label>
        <input type="text" name="longitude_entreprise" value="{{ old('longitude_entreprise', $param->longitude_entreprise ?? '') }}" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Rayon autorisé (en mètre)</label>
        <input type="number" name="rayon" value="{{ old('rayon', $param->rayon ?? '0') }}" class="form-control">
    </div>
    <button class="btn btn-primary">Mettre à jour</button>
</form>
@endsection
