@extends('layouts.app')

@section('content')
<h2>Inscription</h2>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <input name="name" placeholder="Nom" required>
    <input name="email" type="email" placeholder="Email" required>
    <input name="password" type="password" placeholder="Mot de passe" required>
    <input name="password_confirmation" type="password" placeholder="Confirmer mot de passe" required>
    <button type="submit">S’inscrire</button>
</form>
@endsection
