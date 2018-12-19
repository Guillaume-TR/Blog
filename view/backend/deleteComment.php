<?php $this->title = 'Supprimer un commentaire'; ?>

<header id="head" class="secondary"></header>

<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.php?page=admin">Panel d'administration</a></li>
        <li><a href="index.php?page=admin&action=comment">Gérez les commentaires</a></li>
        <li class="active"><?= $this->title ?></li>
    </ol>

    <div class="row">
        <article class="col-md-12 maincontent">

            <header class="page-header">
                <h1 class="page-title"><?= $this->title ?></h1>
            </header>

            <div class="alert alert-danger" role="alert">
                <p>Vous êtes sur le point de <strong>supprimer définitivement</strong> un commentaire.<br>
                    Veuillez noter l'identifiant du commentaire pour confirmer la suppression.</p>
            </div>

			<?php if (isset($_SESSION['message'])) {

				if ($_SESSION['messageType'] === 'success') { ?>
                    <div class="alert alert-success" role="alert">
						<?php
						echo $_SESSION['message'];
						unset($_SESSION['message'], $_SESSION['messageType']);
						?>
                    </div>
				<?php } else { ?>

                    <div class="alert alert-info" role="alert">
                        <strong>Identifiant : </strong><?= $comment->getId() ?>
                    </div>

                    <div class="alert alert-<?= $_SESSION['messageType'] ?>" role="alert">
						<?php
						echo $_SESSION['message'];
						unset($_SESSION['message'], $_SESSION['messageType']);
						?>
                    </div>

                    <form method="post" action="index.php?page=admin&action=deletecomment&id=<?= $comment->getId() ?>">
                        <div class="form-group">
                            <input class="form-control" type="text" name="id">
                        </div>
                        <input class="btn btn-danger" type="submit" name="submit" value="Supprimer">
                    </form>

                    <hr>

                    <div class="alert alert-info" role="alert">
                        <p><strong>Contenu du commentaire</strong></p>
                        <p><?= htmlspecialchars($comment->getContent()) ?></p>
                    </div>

				<?php }
			} else { ?>

                <div class="alert alert-info" role="alert">
                    <strong>Identifiant : </strong><?= $comment->getId() ?>
                </div>

                <form method="post" action="index.php?page=admin&action=deleteComment&id=<?= $comment->getId() ?>">
                    <div class="form-group">
                        <input class="form-control" type="text" name="id">
                    </div>
                    <input class="btn btn-danger" type="submit" name="submit" value="Supprimer">
                </form>

                <hr>

                <div class="alert alert-info" role="alert">
                    <p><strong>Contenu du commentaire</strong></p>
                    <p><?= htmlspecialchars($comment->getContent()) ?></p>
                </div>

			<?php } ?>
        </article>
    </div>

</div>