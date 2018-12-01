<?php $this->title = 'Ajouter un commentaire'; ?>
<h2>Ajouter un nouveau commentaire</h2>
<?php if (isset($message)) {
	echo $message;
} ?>
<form method="post" action="">
	<p><input type="text" id="author" name="author" placeholder="Auteur" aria-label="author"/></p>
	<p><textarea id="content" name="content" placeholder="Contenu de l'article"></textarea></p>
	<p>
        <select name="post_id">
            <?php foreach ($posts as $post): ?>
                <option value="<?= htmlspecialchars($post->getId()) ?>"><?= htmlspecialchars($post->getTitle()) ?></option>
            <?php endforeach; ?>
        </select>
    </p>
	<p><input type="submit" id="submit" name="submit" value="Ajouter"/></p>
</form>