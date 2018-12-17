<?php $this->title = 'Gérez les commentaires'; ?>

<header id="head" class="secondary"></header>

<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.php?page=admin">Panel d'administration</a></li>
        <li class="active"><?= $this->title ?></li>
    </ol>

    <div class="row">
        <article class="col-md-12 maincontent">

            <header class="page-header">
                <h1 class="page-title"><?= $this->title; ?></h1>
            </header>

			<?php if (isset($_GET['id'])) { ?>
                <div class="jumbotron top-space comment-list">
                    <div class="container">

                        <h2 class="text-center thin">
                            <a href="index.php?page=admin&action=comment">Revenir en arrière</a>
                        </h2>

						<?php foreach ($comments as $comment): ?>
                            <div class="highlight comment">
                                <div class="comment-content">
                                    <div class="h-caption">
                                        <h3 class="text-left"><?= $comment->getAuthor(); ?></h3>
                                    </div>
                                    <div class="h-body">
										<?= $comment->getContent(); ?>
                                    </div>
                                </div>
                                <div class="comment-btn">
                                    <a href="index.php?page=admin&action=deleteComment&id=<?= $comment->getId(); ?>"
                                       class="btn btn-danger">Supprimer</a>
                                </div>
                            </div>
						<?php endforeach; ?>

                    </div>
                </div>

			<?php } else { ?>
                <div class="jumbotron top-space comment-episode-list">
                    <div class="container">

                        <h2 class="text-center thin">Commentaires par épisode</h2>

                        <div class="jumbotron-comment">

							<?php foreach ($episodes as $episode): ?>
                                <div class="highlight">
                                    <div class="h-caption"><h3><?= $episode->getTitle(); ?></h3></div>
                                    <div class="h-body text-center">
                                        <p><a href="index.php?page=admin&action=comment&id=<?= $episode->getId(); ?>"
                                              class="btn btn-action">Gérer les commentaires</a></p>
                                    </div>
                                </div>
							<?php endforeach; ?>

                        </div>
                    </div>
                </div>

                <div class="jumbotron top-space comment-list">
                    <div class="container">

                        <h2 class="text-center thin">Commentaires signalés</h2>

                        <div class="jumbotron-comment-admin">
							<?php if (count($commentsReport) > 0) { ?>

								<?php foreach ($commentsReport as $commentReport): ?>
                                    <div class="highlight comment">
                                        <div class="comment-content">
                                            <div class="h-caption">
                                                <h3 class="text-left"><?= htmlspecialchars($commentReport->getAuthor()); ?></h3>
                                            </div>
                                            <div class="h-body">
												<?= htmlspecialchars($commentReport->getContent()); ?>
                                            </div>
                                        </div>
                                        <div class="comment-btn">
                                            <a href="index.php?page=admin&action=approveComment&id=<?= $commentReport->getId(); ?>"
                                               class="btn btn-success">Approuver</a>
                                            <a href="index.php?page=admin&action=deleteComment&id=<?= $commentReport->getId(); ?>"
                                               class="btn btn-danger">Supprimer</a>
                                        </div>
                                    </div>
								<?php endforeach; ?>

							<?php } else { ?>
                                <div class="alert alert-info" role="alert">
                                    Il n'y a pas de commentaires signalés
                                </div>
							<?php } ?>

                        </div>
                    </div>
                </div>

			<?php } ?>
        </article>
    </div>

</div>