<?php $this->title = 'Panel d\'administration'; ?>

<header id="head" class="secondary"></header>

<div class="container">
    <ol class="breadcrumb">
        <li class="active"><?= $this->title ?></li>
    </ol>
    <div class="row">
        <article class="col-md-12 maincontent">
            <header class="page-header">
                <h1 class="page-title"><?= $this->title ?></h1>
            </header>
            <h3><a href="index.php?page=admin&action=episode">Gérez les épisodes</a></h3>
            <blockquote>Gestion des épisodes du livre "Billet simple pour l'Alaska". Ajouter un épisode, modifier un épisode ou supprimer un épisode.
            </blockquote>
            <h3><a href="index.php?page=admin&action=account">Gérez les utilisateurs</a></h3>
            <blockquote>Gestion des utilisateurs du site. Ajouter un utilisateur, modifier un utilisateur ou supprimer un utilisateur.
            </blockquote>
            <h3><a href="index.php?page=admin&action=comment">Gérez les commentaires</a></h3>
            <blockquote>Gestion des commentaires des épisodes. Vérifier les commentaires signalé, approuver un commentaires signalé ou supprimer un commentaire.
            </blockquote>
        </article>
    </div>
</div>