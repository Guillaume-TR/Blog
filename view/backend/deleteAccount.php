<?php $this->title = 'Supprimer un compte'; ?>
<h2>Supprimer un compte</h2>
<?php if (isset($message)) {
	echo $message;
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