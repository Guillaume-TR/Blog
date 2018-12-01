<?php $this->title = 'Ajouter un article'; ?>
<h2>Ajouter un nouvel article</h2>
<?php if (isset($message)) {
	echo $message;
} ?>
<form method="post" action="">
    <p><input type="text" id="title" name="title" placeholder="Titre de l'article" aria-label="title"/></p>
    <p><input type="text" id="author" name="author" placeholder="Auteur" aria-label="author"/></p>
    <p><textarea id="content" name="content" placeholder="Contenu de l'article"></textarea></p>
    <p><input type="submit" id="submit" name="submit" value="Ajouter"/></p>
</form>