<?php $this->title = 'Gérez les commentaires'; ?>
<header id="head" class="secondary"></header>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=admin">Panel d'administration</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $this->title ?></li>
        </ol>
    </nav>
    <article class="col-md-12 maincontent">
        <header class="page-header">
            <h1 class="page-title"><?= $this->title; ?></h1>
        </header>
        <div class="accordion" id="accordionComments">
            <div class="card">
                <div class="card-header" id="heading1">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse1"
                                aria-expanded="true" aria-controls="collapse1">
                            Commentaires signalés
                        </button>
                    </h5>
                </div>
				<?php if (count($commentsReport) > 0) { ?>
					<?php foreach ($commentsReport as $commentReport): ?>
                        <div id="collapse1" class="collapse show" aria-labelledby="heading1"
                             data-parent="#accordionComments">
                            <div class="card-body">
                                <div class="card">
                                    <h5 class="card-header"><?= htmlspecialchars($commentReport->getPseudo()); ?></h5>
                                    <div class="card-body">
                                        <p class="card-text"><?= htmlspecialchars($commentReport->getContent()); ?></p>
                                        <div class="text-center">
                                            <a href="index.php?page=admin&action=approveComment&id=<?= $commentReport->getId(); ?>"
                                               class="btn btn-success m-2">Approuver</a>
                                            <a href="index.php?page=admin&action=deleteComment&id=<?= $commentReport->getId(); ?>"
                                               class="btn btn-danger m-2">Supprimer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php endforeach; ?>
				<?php } else { ?>
                    <div id="collapse1" class="collapse show" aria-labelledby="heading1"
                         data-parent="#accordionComments">
                        <div class="card-body">
                            <div class="alert alert-info" role="alert">
                                Il n'y a pas de commentaires signalés
                            </div>
                        </div>
                    </div>
				<?php } ?>
            </div>
			<?php
            $countId = 1;
			foreach ($episodes as $episode):
                $countId++; ?>
            <div class="card">
                <div class="card-header" id="heading<?= $countId ?>">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapse<?= $countId ?>" aria-expanded="false" aria-controls="collapse<?= $countId ?>">
							<?= $episode->getTitle(); ?>
                        </button>
                    </h5>
                </div>
                <div id="collapse<?= $countId ?>" class="collapse" aria-labelledby="heading<?= $countId ?>" data-parent="#accordionComments">
                    <div class="card-body">
                       <?php foreach ($comments as $comment):
                       if ($episode->getId() === $comment->getEpisode()) { ?>
                        <div class="card my-3">
                            <h5 class="card-header"><?= htmlspecialchars($comment->getPseudo()); ?></h5>
                            <div class="card-body">
                                <p class="card-text"><?= htmlspecialchars($comment->getContent()); ?></p>
                                <div class="text-right">
                                    <a href="index.php?page=admin&action=deleteComment&id=<?= $comment->getId(); ?>"
                                       class="btn btn-danger">Supprimer</a>
                                </div>
                            </div>
                        </div>
					   <?php }
                       endforeach; ?>
                    </div>
                </div>
            </div>
			<?php endforeach; ?>
        </div>
    </article>
</div>