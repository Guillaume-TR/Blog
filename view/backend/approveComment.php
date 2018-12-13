<?php $this->title = 'Approuver un commentaire'; ?>

<header id="head" class="secondary"></header>

<div class="container">
    <ol class="breadcrumb">
        <li><a href="index.php?page=admin">Panel d'administration</a></li>
        <li><a href="index.php?page=admin&action=commentaire">Gérez les commentaires</a></li>
        <li class="active"><?= $this->title ?></li>
    </ol>
    <div class="row">
        <article class="col-md-12 maincontent episodes-admin">
            <header class="page-header">
                <h1 class="page-title"><?= $this->title ?></h1>
            </header>
			<?php if (isset($message)) { ?>
                <div class="alert alert-<?= $messageType ?>" role="alert">
					<?= $message ?>
                </div>
			<?php } ?>
            <div class="alert alert-info" role="alert">
                <strong>Auteur : </strong><?= $comment->getAuthor() ?>
            </div>
            <div class="alert alert-info" role="alert">
                <p class=""><strong>Contenu du commentaire</strong></p>
                <p><?= $comment->getcontent() ?></p>
            </div>
            <form method="post" action="">
                <input class="btn btn-success" type="submit" name="submit" value="Approuver">
            </form>
        </article>
    </div>
</div>
