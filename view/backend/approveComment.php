<?php $this->title = 'Approuver un commentaire'; ?>

<header id="head" class="secondary"></header>

<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.php?page=admin">Panel d'administration</a></li>
        <li><a href="index.php?page=admin&action=comment">Gérez les commentaires</a></li>
        <li class="active"><?= $this->title ?></li>
    </ol>

    <div class="row">
        <article class="col-md-12 maincontent episodes-admin">

            <header class="page-header">
                <h1 class="page-title"><?= $this->title ?></h1>
            </header>

			<?php if (isset($_SESSION['message'])) { ?>
                <hr>
                <div class="alert alert-<?= $_SESSION['messageType'] ?>" role="alert">
					<?php
					echo $_SESSION['message'];
					unset($_SESSION['message'], $_SESSION['messageType']);
					?>
                </div>
			<?php } ?>

            <div class="alert alert-info" role="alert">
                <strong>Pseudo : </strong><?= htmlspecialchars($comment->getPseudo()) ?>
            </div>

            <div class="alert alert-info" role="alert">
                <p><strong>Contenu du commentaire</strong></p>
                <p><?= htmlspecialchars($comment->getcontent()) ?></p>
            </div>

            <form method="post" action="index.php?page=admin&action=approveComment&id=<?= $comment->getId() ?>">
                <input class="btn btn-success" type="submit" name="submit" value="Approuver">
            </form>

        </article>
    </div>

</div>
