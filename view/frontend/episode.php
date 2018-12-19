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
                <form method="post" action="#">
                    <div class="form-group">
                        <label for="author">Pseudo</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo">
                    </div>
                    <div class="form-group">
                        <label for="content">Message</label>
                        <textarea class="form-control" id="content" name="content"></textarea>
                    </div>
                    <input type="submit" name="submit" class="btn btn-success" value="Envoyer">
                </form>
            </div>

			<?php if (isset($message)) {
				?>
                <hr><div class="alert alert-<?= $messageType ?>" role="alert">
				<?= $message ?>
                </div><?php
			} ?>

            <hr>

            <div>
                <?php foreach ($comments as $comment): ?>
                    <div class="jumbotron comment-jumbotron top-space">
                        <p class="comment-author"><strong><?= htmlspecialchars($comment->getPseudo()); ?></strong></p>
                        <hr>
                        <p class="comment-content"><?= htmlspecialchars($comment->getContent()); ?></p>
                        <?php if ($comment->getReport() === '0')  { ?>
                            <p class="text-right">
                                <a href="index.php?page=episode&id=<?= $episode->getId(); ?>&report=<?= $comment->getId(); ?>" class="btn btn-danger">Signaler</a>
                            </p>
						<?php } else { ?>
                            <p class="text-right">
                                Ce commentaire a été signalé.
                            </p>
                        <?php }  ?>
                    </div>
                <?php endforeach; ?>
            </div>

        </article>
    </div>

</div>