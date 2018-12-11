<?php $this->title = 'Supprimer l\'utilisateur'; ?>
<div class="alert alert-danger mt-3" role="alert">
    <p class="mb-0">Vous êtes sur le point de <strong>supprimer définitivement</strong> un utilisateur.<br>
        Veuillez noter le nom d'utilisateur pour confirmer la suppression.</p>
</div>
<?php
if (isset($message)) {
	if ($messageType === 'success') { ?>
        <div class="alert alert-<?= $messageType ?> mt-3" role="alert">
			<?= $message ?>
        </div>
	<?php } else { ?>
        <div class="alert alert-primary" role="alert">
            <strong>Nom d'utilisateur : </strong><?= $account->getUser() ?>
        </div>
        <div class="alert alert-<?= $messageType ?> mt-3" role="alert">
			<?= $message ?>
        </div>
        <form method="post" action="">
            <input class="form-control" type="text" name="username">
            <input class="btn btn-danger mt-3" type="submit" name="submit" value="Supprimer">
        </form>
	<?php }
} else { ?>
    <div class="alert alert-primary" role="alert">
        <strong>Nom d'utilisateur : </strong><?= $account->getUser() ?>
    </div>
    <form method="post" action="">
        <input class="form-control" type="text" name="username">
        <input class="btn btn-danger mt-3" type="submit" name="submit" value="Supprimer">
    </form>
<?php } ?>
