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
		<?= $content ?>
    </div>
</main>
</body>
</html>