<?php
$this->title = 'Toutes les publications'; ?>

<header id="head" class="jumbotron">
    <h1 class="display-4">Billet simple pour l'Alaska</h1>
</header>

<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Billet simple pour l'Alaska</li>
        </ol>
    </nav>
    <br>
	<?php foreach ($episodes as $episode): ?>
        <div class="episode">
            <hr>
            <div class="episode-title">
				<?= $episode->getTitle(); ?>
            </div>
            <div>
                <p><?php if (strlen($episode->getContent()) > 260) {
						echo substr($episode->getContent(), 0, 250) . '...';
					} else {
						echo $episode->getContent();
					} ?></p>
            </div>
            <div class="episode-date">
                Publié le <?= $episode->getDate(); ?>
            </div>
            <hr>
            <div class="text-center">
                <a class="btn btn-primary btn-lg" role="button"
                   href="index.php?page=episode&id=<?= $episode->getId(); ?>">Lire
                    l'épisode</a>
            </div>
        </div>
	<?php endforeach; ?>

</div>
