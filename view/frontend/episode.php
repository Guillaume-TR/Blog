<?php if (isset($notfound)) { ?>
    <script>window.location = "index.php?page=notFound"</script>
<?php } ?>

<?php $this->title = $episode->getTitle(); ?>

<header id="head">
    <div class="container">
        <div class="row">
            <h1 class="lead">Billet simple pour l'Alaska</h1>
        </div>
    </div>
</header>

<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.php?page=episodes">Billet simple pour l'Alaska</a></li>
        <li class="active"><?= $episode->getTitle(); ?></li>
    </ol>
    <div class="row">
        <article id="article" class="col-md-12 maincontent">

            <header class="page-header">
                <h1 class="page-title"><?= $episode->getTitle(); ?></h1>
            </header>

            <p><?= $episode->getContent(); ?></p>

            <hr>

            <div>
                <h3 class="page-title">Ajouter un commentaire</h3>
                <hr>
                <form method="post" action="index.php?page=episode&id=<?= $episode->getId(); ?>">
                    <div class="form-group">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo">
                    </div>
                    <div class="form-group">
                        <label for="content">Message</label>
                        <textarea class="form-control" id="content" name="content"></textarea>
                    </div>
                    <input type="submit" name="submit" class="btn btn-success" value="Envoyer">
                </form>
            </div>
			<?php if (isset($_SESSION['message'])) { ?>
			<hr>
                <div class="alert alert-<?= $_SESSION['messageType'] ?>" role="alert">
					<?php
					echo $_SESSION['message'];
					unset($_SESSION['message'], $_SESSION['messageType']);
                    ?>
                </div>
			<?php } ?>

            <hr>

            <div>
				<?php foreach ($comments as $comment): ?>
                    <div class="jumbotron comment-jumbotron top-space">
                        <p class="comment-pseudo"><strong><?= htmlspecialchars($comment->getPseudo()); ?></strong></p>
                        <hr>
                        <p class="comment-content"><?= htmlspecialchars($comment->getContent()); ?></p>
						<?php if ($comment->getReport() === '0') { ?>
                            <p class="text-right">
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#reportModal<?= $comment->getId(); ?>">
                                    Signaler
                                </button>

                            <div class="modal fade" id="reportModal<?= $comment->getId(); ?>" tabindex="-1" role="dialog"
                                 aria-labelledby="commentReport<?= $comment->getId(); ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="commentReport<?= $comment->getId(); ?>">Signalé un commentaire</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p class="comment-pseudo"><strong><?= htmlspecialchars($comment->getPseudo()); ?></strong></p>
                                            <p class="comment-content"><?= htmlspecialchars($comment->getContent()); ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form method="post" action="index.php?page=episode&id=<?= $episode->getId(); ?>">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button type="submit" name="reportComment" class="btn btn-danger" value="<?= $comment->getId(); ?>">Signaler</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            </p>
						<?php } else { ?>
                            <p class="text-right">
                                Ce commentaire a été signalé.
                            </p>
						<?php } ?>
                    </div>
				<?php endforeach; ?>
            </div>

        </article>
    </div>

</div>