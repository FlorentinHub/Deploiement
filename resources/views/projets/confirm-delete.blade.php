@include('navbar', ['appName' => 'Florentin Toupet'])
@extends('layout')
@section('content')
    <h1>Confirmer la suppression du projet : {{ $projet->nom_projet }}</h1>

    <p>Êtes-vous sûr de vouloir supprimer ce projet ? Cette action est irréversible.</p>

    <form method="POST" action="{{ route('projet.destroy', $projet->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Oui, supprimer le projet</button>
    </form>
    <button href="{{ route('accueil') }}" class="btn btn-secondary">Annuler</button>
@endsection
