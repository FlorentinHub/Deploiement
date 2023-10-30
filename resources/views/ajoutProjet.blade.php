@include('navbar', ['appName' => 'Florentin Toupet'])
<div>
    <form action="/projet" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nom_projet">Nom du Projet:</label>
        <input type="text" id="nom_projet" name="nom_projet" required><br>

        <label for="type_projet">Type de Projet:</label>
        <select id="type_projet" name="type_projet" required>
            <option value="Personnel">Personnel</option>
            <option value="Scolaire">Scolaire</option>
        </select><br>

        <label for="complexite">Niveau de Complexité:</label>
        <input type="number" id="complexite" name="complexite" required><br>

        <label for="pourcentage_complet">Pourcentage Complet:</label>
        <input type="number" id="pourcentage_complet" name="pourcentage_complet" required><br>

        <label for="lien_github">Lien GitHub:</label>
        <input type="url" id="lien_github" name="lien_github"><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea><br>

        @if (count($collaborateurs) > 0)
            <label for="collaborateurs">Sélectionner des Collaborateurs:</label><br>
            <select id="collaborateurs" name="collaborateurs[]" multiple>
                @foreach ($collaborateurs as $collaborateur)
                    <option value="{{ $collaborateur->id }}">{{ $collaborateur->nom_collaborateur }}</option>
                @endforeach
            </select>
            <br><br>
        @else
            <p> Aucune Collaborateur disponible </p>
        @endif

        <input type="file" name="image_projet" /><br><br>
        <input type="submit" value="Ajouter Projet"/>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
