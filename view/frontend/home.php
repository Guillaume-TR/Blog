<?php $this->title = 'Accueil'; ?>

<header id="head">
    <div class="container">

        <div class="row">
            <h1 class="lead">Billet simple pour l'Alaska</h1>
            <p class="tagline">Le dernier livre de Jean Forteroche</p>
            <p><a class="btn btn-action btn-lg" role="button" href="index.php?page=episodes">Lire le livre</a></p>
        </div>

    </div>
</header>

<div class="container text-center">
    <br> <br>

    <h2 class="thin">Publication des épisodes</h2>

    <p class="text-muted">
        Pour son dernier livre, Jean Forteroche innove en vous proposent de lire les épisodes du livre sur ce site !
    </p>
</div>

<div class="jumbotron top-space">
    <div class="container">

        <h2 class="text-center thin">Dernière épisode publié</h2>

        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="h-caption"><h4><?= $lastEpisode->getTitle(); ?></h4></div>
                <div class="h-body">
                    <p><?php if (strlen($lastEpisode->getContent()) > 310) {
							echo substr($lastEpisode->getContent(), 0, 300) . '...';
						} else {
							echo $LastEpisode->getContent();
						} ?></p>
                    <p class="text-center"><a class="btn btn-action btn-lg" role="button" href="index.php?page=episode&id=<?= $lastEpisode->getId(); ?>">Lire l'épisode</a></p>
                </div>
            </div>
        </div>

    </div>
</div>