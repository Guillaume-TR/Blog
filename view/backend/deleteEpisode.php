<?php $this->title = 'Supprimer un épisode'; ?>
<header id="head" class="secondary"></header>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=admin">Panel d'administration</a></li>
            <li class="breadcrumb-item"><a href="index.php?page=admin&action=episode">Gérez les épisodes</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $this->title ?></li>
        </ol>
    </nav>
    <header class="page-header">
        <h1 class="page-title"><?= $this->title ?></h1>
    </header>
    <div class="alert alert-danger" role="alert">
        <p>Vous êtes sur le point de <strong>supprimer définitivement</strong> un épisode ainsi que les commentaires
            associer à l'épisode.<br>
            Veuillez noter le nom de l'épisode pour confirmer la suppression.</p>
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
                <strong>Nom de l'épisode : </strong><?= $episode->getTitle() ?>
            </div>
            <div class="alert alert-<?= $_SESSION['messageType'] ?>" role="alert">
				<?php
				echo $_SESSION['message'];
				unset($_SESSION['message'], $_SESSION['messageType']);
				?>
            </div>
            <form method="post" action="index.php?page=admin&action=deletEpisode&id=<?= $episode->getId() ?>">
                <div class="form-group">
                    <input class="form-control" type="text" name="title">
                </div>
                <input class="btn btn-danger" type="submit" name="submit" value="Supprimer">
            </form>
            <hr>
            <div class="alert alert-info" role="alert">
                <p><strong>Contenu de l'épisode :</strong></p>
                <div><?= $episode->getcontent() ?></div>
            </div>

		<?php }
	} else { ?>
        <div class="alert alert-info" role="alert">
            <strong>Nom de l'épisode : </strong><?= $episode->getTitle() ?>
        </div>
        <form method="post" action="index.php?page=admin&action=deleteEpisode&id=<?= $episode->getId() ?>">
            <div class="form-group">
                <input class="form-control" type="text" name="title">
            </div>
            <input class="btn btn-danger" type="submit" name="submit" value="Supprimer">
        </form>
        <hr>
        <div class="alert alert-info mb-5" role="alert">
            <p><strong>Contenu de l'épisode :</strong></p>
            <div><?= $episode->getcontent() ?></div>
        </div>
	<?php } ?>
</div>
