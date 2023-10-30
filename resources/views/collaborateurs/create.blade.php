@include('navbar', ['appName' => 'Florentin Toupet'])

<div>
    
<form action="/ajouter-collaborateur" method="POST">
    @csrf
    <h2>Ajouter un Collaborateur</h2>
    <label for="nom_collaborateur">Nom du Collaborateur:</label>
    <input type="text" id="nom_collaborateur" name="nom_collaborateur" required><br>

    <label for="compte_github">Compte GitHub:</label>
    <input type="text" id="compte_github" name="compte_github" required><br>

    <label for="contact_courriel">Contact (courriel):</label>
    <input type="email" id="contact_courriel" name="contact_courriel" required><br>

    <label for="degres_implications">Degré d'implication:</label>
    <select id="degres_implications" name="degres_implications" required>
        <option value="Faible">Faible</option>
        <option value="Normal">Normal</option>
        <option value="Haut">Haut</option>
    </select>

    <input type="submit" value="Ajouter Collaborateur">
</form>
</div>
