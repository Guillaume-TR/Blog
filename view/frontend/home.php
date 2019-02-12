<?php $this->title = 'Accueil'; ?>
<header id="head" class="jumbotron">
    <h1 class="display-4"><strong>Billet simple pour l'Alaska</strong></h1>
    <p>Le dernier livre de Jean Forteroche</p>
    <a class="btn btn-primary btn-lg shadow" href="index.php?page=episodes" role="button">Lire le livre</a>
</header>

<div class="container text-center">
    <br>
    <h2>Publication des épisodes</h2>
    <p class="text-muted">
        Pour son dernier livre, Jean Forteroche innove en vous proposent de lire les épisodes du livre sur ce site !
    </p>
</div>

<div class="jumbotron top-space text-center ">
    <div class="container">
        <h2 class="">Dernière épisode publié</h2>
        <div class="h-caption"><h3><?= $lastEpisode->getTitle(); ?></h3></div>
        <div class="h-body">
            <p><?php if (strlen($lastEpisode->getContent()) > 310) {
					echo substr($lastEpisode->getContent(), 0, 300) . '...';
				} else {
					echo $lastEpisode->getContent();
				} ?></p>
            <a class="btn btn-primary btn-lg" role="button" href="index.php?page=episode&id=<?= $lastEpisode->getId(); ?>">Lire l'épisode</a>
        </div>
    </div>
</div>