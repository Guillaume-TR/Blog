<?php $this->title = 'Modifier le commentaire';
if (isset($message)) {
	?>
<div class="alert alert-<?= $messageType ?> mt-3" role="alert">
	<?= $message ?>
    </div><?php
} ?>
<form class="my-3" method="post" action="">
    <div class="alert alert-primary" role="alert">
        <p><strong>Auteur : </strong><?= $comment->getAuthor() ?></p>
        <?= $comment->getContent() ?>
    </div>
    <div class="form-group">
    <input type="submit" name="submit" class="btn btn-success" value="Approuver">
    </div>
</form>
