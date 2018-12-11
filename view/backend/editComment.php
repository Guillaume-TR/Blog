<?php $this->title = 'Modifier le commentaire';
if (isset($message)) {
	?>
<div class="alert alert-<?= $messageType ?> mt-3" role="alert">
	<?= $message ?>
    </div><?php
} ?>
<form class="my-3" method="post" action="">
    <div class="alert alert-primary" role="alert">
        <strong>Auteur : </strong><?= $comment->getAuthor() ?>
    </div>
    <div class="form-group">
        <label for="content">Contenu</label>
        <textarea class="form-control" id="content" name="content"><?php if (isset($_POST['content'])) {
				echo $_POST['content'];
			} else {
				echo $comment->getContent();
			} ?></textarea>
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Modifier le commentaire">
</form>
