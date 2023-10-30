@include('navbar', ['appName' => 'Florentin Toupet'])

<div class="container">
    <h1>À Propos</h1><br>
    <p><strong>Nom :</strong> Florentin Toupet</p>
    <p><strong>Titre du Cours :</strong> 420-5H6 MO Applications Web Transactionnelles</p>
    <p><strong>Session :</strong> Automne 2023, Collège Montmorency</p>
    <br>
    <h2>Utilisation de l'Application Web</h2>
    <p>Cette application web vise à fournir un porfolio sur moi, offrant une gestion de projets et de collaborateurs
        pour moi. Voici les étapes typiques pour vérifier son bon fonctionnement :</p>
    <ol>
        <li><strong>Inscription / Connexion :</strong> Vous pouvez créer un compte ou vous connecter si vous en avez
            déjà un.</li>
        <li><strong>Créer un Projet :</strong> Une fois connecté, mais en tant qu'administrateur, vous pouvez créer un
            nouveau projet en fournissant toutes les informations nécessaires.</li>
        <li><strong>Créer un Collaborateur :</strong> Vous pourrez aussi creer des collaborateurs sur le projet</li>
        <li><strong>Vérifier les Détails du Projet :</strong> Vous pouvez accéder à une vue détaillée de chaque projet
            pour voir les informations, les collaborateurs. Les modifier ou les supprimer.</li>
    </ol>
    <br>
    <h2>Base de Données</h2>
    <p>La base de données actuelle de l'application est conçue pour stocker des informations sur les utilisateurs, les
        projets, les collaborateurs, et les tâches. Elle est structurée pour prendre en charge la gestion des projets
        collaboratifs.</p>

    <br>
</div>
<style>
    body {
        margin-left: 15px;
    }
</style>
@include('footer')
