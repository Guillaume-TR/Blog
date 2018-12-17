<?php $this->title = 'Gérez les épisodes'; ?>

<header id="head" class="secondary"></header>

<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.php?page=admin">Panel d'administration</a></li>
        <li class="active"><?= $this->title ?></li>
    </ol>

    <div class="row">
        <article class="col-md-12 maincontent list-admin">

            <header class="page-header">
                <h1 class="page-title"><?= $this->title ?></h1>
            </header>

            <a href="index.php?page=admin&action=addEpisode" class="btn btn-success">Ajouter un épisode</a>

			<?php foreach ($episodes as $episode): ?>
                <div class="jumbotron top-space episode-manage">

                    <h3><?= $episode->getTitle(); ?></h3>

                    <div class="episode-content"><?= substr($episode->getContent(), 0, 200) . '...'; ?></div>

                    <p class="text-right">
                        <a href="index.php?page=admin&action=editEpisode&id=<?= $episode->getId(); ?>"
                           class="btn btn-warning">Modifier</a>
                        <a href="index.php?page=admin&action=deleteEpisode&id=<?= $episode->getId(); ?>"
                           class="btn btn-danger">Supprimer</a>
                    </p>

                </div>
			<?php endforeach; ?>

        </article>
    </div>

</div>