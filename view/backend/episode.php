<?php $this->title = 'Gérez les épisodes'; ?>
<header id="head" class="secondary"></header>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $this->title ?></li>
        </ol>
    </nav>
    <article class="col-md-12 maincontent">
        <header class="page-header">
            <h1 class="page-title"><?= $this->title ?></h1>
        </header>
        <div class="text-center mt-4 mb-2">
            <a href="index.php?page=admin&action=addEpisode" class="nav-link btn btn-success">Ajouter un nouvel épisode</a>
        </div>
		<?php foreach ($episodes as $episode): ?>
            <div class="card my-3">
                <h4 class="card-header"><?= $episode->getTitle(); ?></h4>
                <div class="card-body">
                    <p class="card-text"><?= substr($episode->getContent(), 0, 300) . '...'; ?></p>
                    <a href="index.php?page=admin&action=editEpisode&id=<?= $episode->getId(); ?>"
                       class="btn btn-info btn-lg m-2">Modifier</a>
                    <a href="index.php?page=admin&action=deleteEpisode&id=<?= $episode->getId(); ?>"
                       class="btn btn-danger btn-lg m-2">Supprimer</a>
                </div>
            </div>
		<?php endforeach; ?>
    </article>
</div>