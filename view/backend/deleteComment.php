<?php $this->title = 'Supprimer le commentaire'; ?>
<div class="alert alert-danger mt-3" role="alert">
    <p class="mb-0">Vous êtes sur le point de <strong>supprimer définitivement</strong> un commentaire.<br>
        Veuillez noter l'identifiant du commentaire pour confirmer la suppression.</p>
</div>
<?php
if (isset($message)) {
	if ($messageType === 'success') { ?>
        <div class="alert alert-<?= $messageType ?> mt-3" role="alert">
			<?= $message ?>
        </div>
	<?php } else { ?>
        <div class="alert alert-primary" role="alert">
            <strong>Identifiant du commentaire : </strong><?= $comment->getId() ?>
        </div>
        <div class="alert alert-<?= $messageType ?> mt-3" role="alert">
			<?= $message ?>
        </div>
        <form method="post" action="">
            <input class="form-control" type="text" name="id">
            <input class="btn btn-danger mt-3" type="submit" name="submit" value="Supprimer">
        </form>
        <div>
            <h2><?= htmlspecialchars($comment->getAuthor()) ?></h2>
            <p><?= htmlspecialchars($comment->getcontent()) ?></p>
        </div>
	<?php }
} else { ?>
    <div class="alert alert-primary" role="alert">
        <strong>Identifiant du commentaire : </strong><?= $comment->getId() ?>
    </div>
    <form method="post" action="">
        <input class="form-control" type="text" name="id">
        <input class="btn btn-danger mt-3" type="submit" name="submit" value="Supprimer">
    </form>
    <div>
        <h2><?= htmlspecialchars($comment->getAuthor()) ?></h2>
        <p><?= htmlspecialchars($comment->getcontent()) ?></p>
    </div>
<?php } ?>
