<?php $this->title = 'Supprimer l\'épisode'; ?>
<div class="alert alert-danger mt-3" role="alert">
	<p class="mb-0">Vous êtes sur le point de <strong>supprimer définitivement</strong> un épisode.<br>
	Veuillez noter le nom de l'épisode pour confirmer la suppression.</p>
</div>
<?php
if (isset($message)) {
    if ($messageType === 'success') { ?>
    <div class="alert alert-<?= $messageType ?> mt-3" role="alert">
        <?= $message ?>
    </div>
    <?php } else { ?>
        <div class="alert alert-primary" role="alert">
            <strong>Nom de l'épisode : </strong><?= $episode->getTitle() ?>
        </div>
        <div class="alert alert-<?= $messageType ?> mt-3" role="alert">
            <?= $message ?>
		</div>
		<form method="post" action="">
			<input class="form-control" type="text" name="title">
			<input class="btn btn-danger mt-3" type="submit" name="submit" value="Supprimer">
		</form>
		<div>
		<h2><?= $episode->getTitle() ?></h2>
		<p><?= $episode->getcontent() ?></p>
		</div>
    <?php }
} else { ?>
    <div class="alert alert-primary" role="alert">
        <strong>Nom de l'épisode : </strong><?= $episode->getTitle() ?>
    </div>
	<form method="post" action="">
		<input class="form-control" type="text" name="title">
		<input class="btn btn-danger mt-3" type="submit" name="submit" value="Supprimer">
	</form>
	<div>
		<h2><?= $episode->getTitle() ?></h2>
		<p><?= $episode->getcontent() ?></p>
	</div>
<?php } ?>
