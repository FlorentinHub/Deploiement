@include('navbar', ['appName' => 'Florentin Toupet'])
@extends('layout')
@section('content')
    <h1>Modifier le projet : {{ $projet->nom_projet }}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('projet.update', $projet->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom_projet">Nom du projet</label>
            <input type="text" class="form-control" id="nom_projet" name="nom_projet" value="{{ $projet->nom_projet }}">
        </div>

        <div class="form-group">
            <label for="type_projet">Type de projet</label>
            <input type="text" class="form-control" id="type_projet" name="type_projet" value="{{ $projet->type_projet }}">
        </div>

        <div class="form-group">
            <label for="complexite">Complexité</label>
            <input type="number" class="form-control" id="complexite" name="complexite" value="{{ $projet->complexite }}">
        </div>

        <div class="form-group">
            <label for="pourcentage_complet">Pourcentage Complet</label>
            <input type="number" class="form-control" id="pourcentage_complet" name="pourcentage_complet" value="{{ $projet->pourcentage_complet }}">
        </div>

        <div class="form-group">
            <label for="lien_github">Lien GitHub</label>
            <input type="text" class="form-control" id="lien_github" name="lien_github" value="{{ $projet->lien_github }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $projet->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    </form>
@endsection
