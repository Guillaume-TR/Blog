<?php $this->title = 'Ajouter un article'; ?>
<h2><?= $this->title ?></h2>
<?php if (isset($message) && isset($messageType)) {
	?>
    <div id="info-message"<?= ' class="' . $messageType . '"' ?>><?= $message ?></div>
	<?php
} ?>
<form method="post" action="">
    <div class="post-content">
        <div class="post-data-content">
            <div class="post-header">
                <input type="text" id="title" name="title" placeholder="Titre de l'article" aria-label="title" required/>
            </div>
            <div class="post-message">
                <textarea id="content" name="content" placeholder="Contenu de l'article ..." required></textarea>
            </div>
        </div>
        <div class="post-button">
            <div class="post-button-add">
                <input type="submit" id="submit" name="submit" value="Ajouter"/>
            </div>
        </div>
    </div>
</form>