<?php $this->title = 'Supprimer un article'; ?>
<h2>Supprimer un article</h2>
<?php if (isset($message)) {
	echo $message;
} ?>
<form method="post" action="">
	<p><label for="id_post">Article</label>
		<select id="id_post" name="id">
			<?php foreach ($posts as $post): ?>
				<option value="<?= htmlspecialchars($post->getId()) ?>"><?= htmlspecialchars($post->getTitle()) ?></option>
			<?php endforeach; ?>
		</select>
	</p>
	<p><input type="submit" id="submit" name="submit" value="Supprimer"/></p>
</form>