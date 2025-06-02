@extends('layouts.app')

@section('content')
<h2>Mes Livres</h2>
<a href="{{ route('livres.create') }}" class="btn btn-primary mb-3">Ajouter un livre</a>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert" id="success-message">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Script pour disparition automatique -->
<script>
    setTimeout(function() {
        const message = document.getElementById('success-message');
        if (message) {
            message.style.transition = 'opacity 0.5s ease-out';
            message.style.opacity = '0';
            setTimeout(() => message.remove(), 500); // après le fondu
        }
    }, 5000); // 5 secondes
</script>

<form method="GET" action="{{ route('livres.index') }}" class="mb-3 d-flex">
    <input type="text" name="search" class="form-control me-2" placeholder="Rechercher un livre ou auteur..." value="{{ request('search') }}">
    <button type="submit" class="btn btn-outline-primary">Rechercher</button>

    @if(request('search'))
        <a href="{{ route('livres.index') }}" class="btn btn-secondary ms-2">Réinitialiser</a>
    @endif
</form>

<a href="{{ route('books.export.excel') }}" class="btn btn-success me-2">Télécharger Excel</a>
<a href="{{ route('books.export.pdf') }}" class="btn btn-danger">Télécharger PDF</a>

@if($livres->count() > 0)
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Année</th>
                <th>Genre</th>
                <th>Resume</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($livres as $livre)
                <tr>
                    <td>{{ $livre->titre }}</td>
                    <td>{{ $livre->auteur }}</td>
                    <td>{{ $livre->annee }}</td>
                    <td>{{ $livre->genre }}</td>
                    <td>{{ $livre->resume }}</td>
                    <td>
                        <a href="{{ route('livres.edit', $livre->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('livres.destroy', $livre->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer ce livre ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $livres->withQueryString()->links('pagination::bootstrap-5') }}
@else
    <div class="alert alert-info mt-3">
        @if(request('search'))
            Aucun livre trouvé pour "{{ request('search') }}".
        @else
            Aucun livre enregistré pour le moment.
        @endif
    </div>
@endif

@endsection
