<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Mon blog | <?= $title ?></title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">

	<!-- Custom styles for this template -->
	<link href="starter-template.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top d-flex justify-content-between">
	<a class="navbar-brand btn btn-light" style="color: #333;" href="index.php">Mon blog</a>
	<?php if (isset($_SESSION['id'])) { ?>
		<div>
			<?php if ($_SESSION['level'] === '2') { ?>
				<a href="index.php?page=admin" class="btn btn-primary my-2 my-sm-0 mx-sm-2 " type="submit">Espace admin</a>
			<?php } ?>
			<a href="index.php?page=disconnect" class="btn btn-danger my-2 my-sm-0" type="submit">Se déconnecter</a>
		</div>
	<?php } else { ?>
		<form class="form-inline" method="post" action="index.php?page=connection">
			<input class="form-control mx-2 my-2 my-sm-0" type="text" placeholder="Nom d'utilisateur" aria-label="username" name="username">
			<input class="form-control mx-2 my-2 my-sm-0" type="password" placeholder="Mot de passe" aria-label="password" name="password">
			<button class="btn btn-success mx-2 my-2 my-sm-0" type="submit">Se connecter</button>
		</form>
	<?php } ?>
</nav>
<main role="main" class="container-fluid">
	<div class="starter-template" style="margin-top: 56px;">
		<div class="row">
			<div class="col-lg-3 px-0 py-0" style="background-color: #343A40;">
                <h3 class="py-2 px-2" style="color: #cccccc;">Article</h3>
                <ul class="my-0 py-2" style="background-color: #cccccc; color: #343A40;">
                    <li><a href="index.php?page=admin&action=addPost" class="" style="color: #343A40;">Ajouter un article</a></li>
                    <li><a href="index.php?page=admin&action=editPost" class="" style="color: #343A40;">Modifier un article</a></li>
                    <li><a href="index.php?page=admin&action=deletePost" class="" style="color: #343A40;">Supprimer un article</a></li>
                </ul>
                <h3 class="py-2 px-2" style="color: #cccccc;">Commentaire</h3>
                <ul class="my-0 py-2" style="background-color: #cccccc; color: #343A40;">
                    <li><a href="index.php?page=admin&action=addComment" class="" style="color: #343A40;">Ajouter un commentaire</a></li>
                    <li><a href="index.php?page=admin&action=editComment" class="" style="color: #343A40;">Modifier un commentaire</a></li>
                    <li><a href="index.php?page=admin&action=deleteComment" class="" style="color: #343A40;">Supprimer un commentaire</a></li>
                </ul>
         		<h3 class="py-2 px-2" style="color: #cccccc;">Compte</h3>
         		<ul class="my-0 py-2" style="background-color: #cccccc; color: #343A40;">
         			<li><a href="index.php?page=admin&action=addAccount" class="" style="color: #343A40;">Ajouter un compte</a></li>
         			<li><a href="index.php?page=admin&action=editAccount" class="" style="color: #343A40;">Modifier un compte</a></li>
         			<li><a href="index.php?page=admin&action=deleteAccount" class="" style="color: #343A40;">Supprimer un compte</a></li>
         	 	</ul>
			</div>
			<div class="col-lg-9"><?= $content ?></div>
		</div>
	</div>
</main>
</body>
</html>