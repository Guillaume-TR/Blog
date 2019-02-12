<?php $this->title = 'Panel d\'administration'; ?>
<header id="head" class="secondary"></header>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><?= $this->title ?></li>
        </ol>
    </nav>
    <div class="row">
        <article class="col-md-12 maincontent">
            <header class="page-header">
                <h1 class="page-title text-center"><?= $this->title ?></h1>
            </header>
            <blockquote class="blockquote">
                <p class="mb-0"><h2><a href="index.php?page=admin&action=episode">Gérez les épisodes</a></h2></p>
                <footer class="blockquote-footer">Gestion des épisodes du livre "Billet simple pour l'Alaska".
                    Ajouter un épisode, modifier un épisode ou supprimer un épisode.</footer>
            </blockquote>
            <blockquote class="blockquote">
                <p class="mb-0"><h2><a href="index.php?page=admin&action=account">Gérez les utilisateurs</a></h2></p>
                <footer class="blockquote-footer">Gestion des utilisateurs du site.
                    Ajouter un utilisateur, modifier un utilisateur ou supprimer un utilisateur.</footer>
            </blockquote>
            <blockquote class="blockquote">
                <p class="mb-0"><h2><a href="index.php?page=admin&action=comment">Gérez les commentaires</a></h2></p>
                <footer class="blockquote-footer">Gestion des commentaires postés sur les épisodes.
                    Vérifier les commentaires signalé, approuver un commentaires signalé ou supprimer un commentaire.</footer>
            </blockquote>
        </article>
    </div>
</div>