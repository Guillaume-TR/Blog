<?php $this->title = 'Modifier un compte'; ?>
<h2><?= $this->title ?></h2>
<?php if (isset($message) && isset($messageType)) {
	?>
    <div id="info-message"<?= ' class="' . $messageType . '"' ?>><?= $message ?></div>
	<?php
} ?>
<form method="post" action="">
	<p><label for="id_account">Compte</label>
		<select id="id_account" name="id">
			<?php foreach ($accounts as $account): ?>
				<option value="<?= htmlspecialchars($account->getId()) ?>"><?= htmlspecialchars($account->getUser()) ?></option>
			<?php endforeach; ?>
		</select>
	</p>
	<p><input type="submit" id="submit" name="submit" value="Supprimer"/></p>
</form>