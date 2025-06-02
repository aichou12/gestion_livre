@extends('layouts.app')

@section('content')
<h2>Modifier le Livre</h2>

<form method="POST" action="{{ route('livres.update', $livre) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Titre</label>
        <input type="text" name="titre" class="form-control" value="{{ $livre->titre }}" required>
    </div>
    <div class="mb-3">
        <label>Auteur</label>
        <input type="text" name="auteur" class="form-control" value="{{ $livre->auteur }}" required>
    </div>
    <div class="mb-3">
        <label>Année</label>
        <input type="number" name="annee" class="form-control" value="{{ $livre->annee }}" required>
    </div>
    <div class="mb-3">
        <label>Genre</label>
        <input type="text" name="genre" class="form-control" value="{{ $livre->genre }}" required>
    </div>
    <div class="mb-3">
        <label>Résumé</label>
        <textarea name="resume" class="form-control">{{ $livre->resume }}</textarea>
        </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
    <a href="{{ route('livres.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection
