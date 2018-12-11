<?php $this->title = 'Ajouter un utilisateur'; ?>
<h2 class="text-center mt-3 mb-4">Ajouter un utilisateur</h2>
<?php if (isset($message)) {
	?>
    <div class="alert alert-<?= $messageType ?>" role="alert">
	<?= $message ?>
    </div><?php
} ?>
<form class="my-3" method="post" action="">
    <div class="input-group mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Nom d'utilisateur</span>
        </div>
        <input type="text" class="form-control" aria-label="Username" name="username"
               aria-describedby="basic-addon1"<?php
		if (isset($_POST['username'])) {
			echo ' value="' . $_POST['username'] . '"';
		} ?>>
    </div>
    <small id="usernameHelp" class="form-text text-muted">Le nom d'utilisateur doit comporter au moin 5 caractères.
    </small>
    <div class="input-group mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon2">Mot de passe</span>
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
    <input type="submit" name="submit" class="btn btn-primary mt-3" value="Ajouter l'utilisateur">
</form>