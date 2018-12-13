<?php $this->title = 'Toutes les publications'; ?>

<header id="head">
    <div class="container">
        <div class="row">
            <h1 class="lead">Billet simple pour l'Alaska</h1>
        </div>
    </div>
</header>

<div class="container">

    <ol class="breadcrumb">
        <li class="active">Billet simple pour l'Alaska</li>
    </ol>
    <br> <br>

	<?php foreach ($episodes as $episode): ?>
        <div class="episode">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
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
                        Date de publication - <?= $episode->getDate(); ?>.
                    </div>
                    <hr>
                    <div class="text-center">
                        <a class="btn btn-action" role="button"
                           href="index.php?page=episode&id=<?= $episode->getId(); ?>">Lire
                            l'épisode</a>
                    </div>
                </div>
            </div>
        </div>
	<?php endforeach; ?>

</div>
