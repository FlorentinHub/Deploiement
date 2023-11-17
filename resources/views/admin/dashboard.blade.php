@extends('layouts.app')
@include('navbar', ['appName' => 'Florentin Toupet'])
@section('content')
    <section class="dashboard">
        <div class="statistics">
            <h2>Statistiques</h2>
            <div class="stat-card">
                <h3>Nombre de projets</h3>
                <p>{{ $nombreDeProjets }}</p>
            </div>
            <div class="stat-card">
                <h3>Nombre de collaborateurs</h3>
                <p>{{ $nombreDeCollaborateurs }}</p>
            </div>
        </div>
        <!-- Ici, chaque projet sera affiché sous forme de div -->
        <!-- Chaque div aura un titre de projet, des icônes pour modifier et supprimer -->
        <!-- Les liens pour modifier et supprimer seront ajoutés ici -->
        <!-- ... -->

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const projects = document.querySelectorAll('.project');
                projects.forEach(project => {
                    project.addEventListener('click', () => {
                        project.classList.toggle('expanded');
                    });
                });
            });
        </script>


        <div class="projects">
            <h2>Projets</h2>
            <div class="filter">
                <label for="typeFilter">Filtrer par type :</label>
                <select name="typeFilter" id="typeFilter">
                    <option value="">Tous</option>
                    <option value="personnel">Personnel</option>
                    <option value="scolaire">Scolaire</option>
                </select>
            </div>
            <div class="projects-list">
                @foreach ($projets as $projet)
                    <div class="project">
                        <h3>{{ $projet->id }} - {{ $projet->nom_projet }}</h3>
                        <div class="project">
                            @if (auth()->check() && auth()->user()->isAdmin)
                                <div class="actions">
                                    <a href="{{ route('projet.edit', $projet->id) }}"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('projet.confirmDelete', $projet->id) }}"><i
                                            class="fas fa-trash-alt"></i></a>
                                </div>
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>
            <button id="deleteAllProjectsBtn" class="btn delete-btn">Supprimer tous les projets</button>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const deleteAllProjectsBtn = document.getElementById('deleteAllProjectsBtn');
                    deleteAllProjectsBtn.addEventListener('click', () => {
                        const confirmation = confirm("Êtes-vous sûr de vouloir supprimer tous les projets ?");
                        if (confirmation) {
                            dd("On supprime !");
                            // Effectuez ici l'appel à la suppression de tous les projets via une requête Ajax ou une redirection vers la route appropriée.
                        }
                    });
                });
            </script>
        </div>
    </section>
@endsection

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #121212;
        color: #fff;
        margin: 0;
        padding: 0;
    }

    .dashboard {
        padding: 20px;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .statistics,
    .projects {
        background-color: #1f1f1f;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 10px;
        width: 45%;
    }

    .statistics h2,
    .projects h2 {
        color: #fff;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .stat-card,
    .project {
        background-color: #333;
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 8px;
    }

    .stat-card h3,
    .project h3 {
        color: #fff;
        font-size: 18px;
        margin-bottom: 10px;
    }

    .project h3 {
        font-size: 20px;
    }

    .actions {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .actions a {
        color: #fff;
        text-decoration: none;
        margin-right: 10px;
        font-size: 18px;
    }

    .actions a:hover {
        opacity: 0.8;
    }

    /* Pour les icônes */
    i.fas {
        font-size: 1.2em;
    }

    .project.expanded .project-details {
        display: block;
    }

    .project-details {
        display: none;
        /* Ajoutez le style pour les informations détaillées ici */
    }
</style>

{{-- <!-- Section pour afficher les statistiques -->
    <section class="stats">
        <div class="stat">
            <h2>Nombre de projets présents</h2>
            <p>{{ $nombreDeProjets }}</p>
        </div>
        <div class="stat">
            <h2>Nombre de collaborateurs présents</h2>
            <p>{{ $nombreDeCollaborateurs }}</p>
        </div>
    </section>

    <!-- Section pour afficher la liste des projets -->
    <section class="projects">
        @foreach ($projets as $projet)
            <div class="project">
                <h3>{{ $projet->nom_projet }}</h3>
                <!-- Ajoutez les liens pour supprimer et modifier ici -->
                <a href="{{ route('projet.edit', $projet->id) }}">Modifier</a>
                <a href="{{ route('projet.confirmDelete', $projet->id) }}">Supprimer</a>
            </div>
        @endforeach
    </section>
@endsection

<style>
    body {
        background-color: #1f1f1f;
        color: #fff;
        font-family: Arial, sans-serif;
    }

    .stats {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
    }

    .stat {
        background-color: #333;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
    }

    .projects {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 20px;
        margin-top: 40px;
    }

    .project {
        background-color: #333;
        padding: 20px;
        border-radius: 8px;
    }

    .project h3 {
        margin-bottom: 10px;
    }

    a {
        color: #fff;
        text-decoration: none;
        margin-right: 10px;
    }

    .stats {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
    }

    .stat {
        background-color: #333;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        transition: transform 0.3s ease;
        cursor: pointer;
    }

    .stat:hover {
        transform: scale(1.1);
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
    }

    .stat h2 {
        font-size: 24px;
        margin-bottom: 10px;
        color: #fff;
    }

    .stat p {
        font-size: 48px;
        font-weight: bold;
        color: #fff;
    }

    /* Effet de survol sur les chiffres */
    .stat p:hover {
        text-shadow: 0 0 5px rgba(255, 255, 255, 0.8);
    }
</style> --}}
