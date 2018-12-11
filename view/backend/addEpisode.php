<?php $this->title = 'Ajouter un épisode'; ?>
<?php if (isset($message)) {
	?><div class="alert alert-<?= $messageType ?>" role="alert">
	<?= $message ?>
    </div><?php
} ?>
<form class="my-3" method="post" action="">
    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Titre de l'épisode"<?php
         if (isset($_POST['title'])) {
			echo ' value="' . $_POST['title'] . '"';
		} ?>>
    </div>
    <div class="form-group">
        <label for="content">Contenu</label>
        <textarea class="tiny-editor" id="content" name="content"><?php if (isset($_POST['content'])) {
            echo $_POST['content'];
            } ?></textarea>
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Ajouter l'épisode">
</form>