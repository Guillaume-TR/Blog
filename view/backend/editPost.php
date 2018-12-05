<?php $this->title = 'Modifier un article'; ?>
<h2><?= $this->title ?></h2>
<?php if (isset($message) && isset($messageType)) {
	?>
    <div id="info-message"<?= ' class="' . $messageType . '"' ?>><?= $message ?></div>
    <?php
} ?>
<?php foreach ($posts as $post): ?>
<form method="post" action="">
    <input type="text" id="id-disabled" name="id" value="<?= htmlspecialchars($post->getId()) ?>" >
    <div class="post-content">
        <div class="post-data-content">
            <div class="post-header">
                <input type="text" id="title" name="title" placeholder="Titre de l'article" aria-label="title" value="<?= htmlspecialchars($post->getTitle()) ?>" required/>
            </div>
            <div class="post-message">
                <textarea id="content" name="content" placeholder="Contenu de l'article ..." aria-label="content"><?= $post->getContent() ?></textarea>
            </div>
        </div>
        <div class="post-button">
            <div class="post-button-edit">
                <input type="submit" id="submit" name="edit-post" value="Modifier"/>
            </div>
            <div class="post-button-delete">
                <input type="submit" id="submit" name="delete-post" value="Supprimer"/>
            </div>
        </div>
    </div>
</form>
<?php endforeach; ?>