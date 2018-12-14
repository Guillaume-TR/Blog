<?php $this->title = 'Supprimer un épisode'; ?>

<header id="head" class="secondary"></header>

<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.php?page=admin">Panel d'administration</a></li>
        <li><a href="index.php?page=admin&action=episode">Gérez les épisodes</a></li>
        <li class="active"><?= $this->title ?></li>
    </ol>

    <div class="row">
        <article class="col-md-12 maincontent episodes-admin">

            <header class="page-header">
                <h1 class="page-title"><?= $this->title ?></h1>
            </header>

            <div class="alert alert-danger" role="alert">
                <p>Vous êtes sur le point de <strong>supprimer définitivement</strong> un épisode.<br>
                    Veuillez noter le nom de l'épisode pour confirmer la suppression.</p>
            </div>

			<?php if (isset($message)) {

				if ($messageType === 'success') { ?>

                    <div class="alert alert-success" role="alert">
						<?= $message ?>
                    </div>

				<?php } else { ?>

                    <div class="alert alert-info" role="alert">
                        <strong>Nom de l'épisode : </strong><?= $episode->getTitle() ?>
                    </div>

                    <div class="alert alert-<?= $messageType ?>" role="alert">
						<?= $message ?>
                    </div>

                    <form method="post" action="">
                        <div class="form-group">
                            <input class="form-control" type="text" name="title">
                        </div>
                        <input class="btn btn-danger" type="submit" name="submit" value="Supprimer">
                    </form>

                    <hr>

                    <div class="alert alert-info" role="alert">
                        <p><strong>Contenu de l'épisode :</strong></p>
                        <p><?= $episode->getcontent() ?></p>
                    </div>

				<?php }
			} else { ?>

                <div class="alert alert-info" role="alert">
                    <strong>Nom de l'épisode : </strong><?= $episode->getTitle() ?>
                </div>

                <form method="post" action="">
                    <div class="form-group">
                        <input class="form-control" type="text" name="title">
                    </div>
                    <input class="btn btn-danger" type="submit" name="submit" value="Supprimer">
                </form>

                <hr>

                <div class="alert alert-info" role="alert">
                    <p"><strong>Contenu de l'épisode :</strong></p>
                    <p><?= $episode->getcontent() ?></p>
                </div>

			<?php } ?>
        </article>
    </div>

</div>
