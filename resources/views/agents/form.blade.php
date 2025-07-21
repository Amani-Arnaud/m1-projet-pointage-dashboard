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
    <label class="form-label">Nom</label>
    <input type="text" name="Nom" class="form-control" value="{{ old('Nom', $agent->Nom ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Prénom</label>
    <input type="text" name="Prenom" class="form-control" value="{{ old('Prenom', $agent->Prenom ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Matricule</label>
    <input type="text" name="Matricule" class="form-control" value="{{ old('Matricule', $agent->Matricule ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Poste</label>
    <input type="text" name="parcours" class="form-control" value="{{ old('parcours', $agent->parcours ?? '') }}">
</div>
<button type="submit" class="btn btn-success">Enregistrer</button>
