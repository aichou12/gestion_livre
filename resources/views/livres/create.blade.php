@extends('layouts.app')

@section('content')
<h2>Ajouter un nouveau livre</h2>

<form action="{{ route('livres.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="titre" class="form-label">Titre</label>
        <input type="text" name="titre" id="titre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="auteur" class="form-label">Auteur</label>
        <input type="text" name="auteur" id="auteur" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="annee" class="form-label">Année</label>
        <input type="number" name="annee" id="annee" class="form-control">
    </div>
    <div class="mb-3">
        <label for="genre" class="form-label">Genre</label>
        <input type="text" name="genre" id="genre" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
@endsection
