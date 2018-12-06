<?php $this->title = 'Modifier un utilisateur'; ?>
<h2 class="text-center mt-3 mb-4">Modifier un utilisateur</h2>
<div class="alert alert-primary" role="alert">
    <strong>Nom d'utilisateur : </strong><?= $account->getUser() ?>
</div>
<?php if (isset($message)) {
	?><div class="alert alert-<?= $messageType ?>" role="alert">
	<?= $message ?>
    </div><?php
} ?>
<form class="my-3" method="post" action="">
    <div class="input-group mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon2">Nouveau mot de passe</span>
        </div>
        <input type="password" class="form-control" id="password" name="password" aria-describedby="basic-addon2">
    </div>
    <small id="passwordHelp" class="form-text text-muted">Le mot de passe doit comporter au moin 5 caractères.</small>
    <div class="input-group mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3">Confirmer</span>
        </div>
        <input type="password" class="form-control" id="confirm" name="confirm" aria-describedby="basic-addon3">
    </div>
    <small id="confirmHelp" class="form-text text-muted">Doit être identique au mot de passe.</small>
    <div class="input-group mt-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="level">Permission</label>
        </div>
        <select class="custom-select" id="level" name="level">
            <option selected>Choisissez...</option>
            <option value="1">Utilisateur</option>
            <option value="2">Administrateur</option>
        </select>
    </div>
    <small id="confirmHelp" class="form-text text-muted">Choisissez les permissions accordées au compte.</small>
    <input type="submit" name="submit" class="btn btn-primary mt-3" value="Modifier l'utilisateur">
</form>