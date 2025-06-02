@extends('layouts.app')
@if(session('success'))
    <div class="alert alert-success" id="success-message">
        {{ session('success') }}
    </div>

    <script>
        // Disparaît après 5 secondes (5000 ms)
        setTimeout(() => {
            const alert = document.getElementById('success-message');
            if (alert) {
                alert.style.transition = 'opacity 1s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 1000); // Supprime l'élément après fondu
            }
        }, 5000);
    </script>
@endif


@section('content')
<h2>Connexion</h2>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <input name="email" type="email" placeholder="Email" required>
    <input name="password" type="password" placeholder="Mot de passe" required>
    <button type="submit">Se connecter</button>
</form>
@endsection
