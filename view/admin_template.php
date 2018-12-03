<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
    <!-- CSS -->
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

    <title>Mon blog | <?= $title ?></title>
</head>

<body>
<a class="nav-title" href="index.php">Jean Forteroche</a>
<nav>
    <div>
		<?php if (isset($_SESSION['id'])) { ?>
			<?php if ($_SESSION['level'] === '2') { ?>
                <a href="index.php?page=admin" class="btn-admin">Administration</a>
			<?php } ?>
            <a href="index.php?page=disconnect" class="btn-disconnect">Se déconnecter</a>
		<?php } else { ?>
            <form class="navbar-form" method="post" action="index.php?page=connection">
                <input type="text" placeholder="Nom d'utilisateur" aria-label="username" name="username"><br>
                <input type="password" placeholder="Mot de passe" aria-label="password" name="password"><br>
                <button type="submit">Se connecter</button>
            </form>
		<?php } ?>
    </div>
</nav>
<main class="container">
    <ul id="menu-admin">
        <li class="menu-btn">
            <label for="menu-btn"><span><i class="fa fa-chevron-down"></i></span></label>
            <input id="menu-btn" type="checkbox">
            <ul class="menu-content">
                <li class="menu-sub">
                    <label for="menu-1"><span>Article</span></label>
                    <input id="menu-1" type="checkbox">
                    <ul class="menu-sub-sub">
                        <li><a href="index.php?page=admin&action=addPost">Ajouter</a></li>
                        <li><a href="index.php?page=admin&action=editPost">Modifier</a></li>
                    </ul>
                </li>
                <li class="menu-sub">
                    <label for="menu-2"><span>Compte</span></label>
                    <input id="menu-2" type="checkbox">
                    <ul class="menu-sub-sub">
                        <li><a href="index.php?page=admin&action=addAccount">Ajouter</a></li>
                        <li><a href="index.php?page=admin&action=editAccount">Modifier</a></li>
                    </ul>
                </li>
                <li class="menu-sub">
                    <label for="menu-3"><span>Commentaire</span></label>
                    <input id="menu-3" type="checkbox">
                    <ul class="menu-sub-sub">
                        <li><a href="index.php?page=admin&action=addComment">Ajouter</a></li>
                        <li><a href="index.php?page=admin&action=editComment">Modifier</a></li>
                        <li><a href="index.php?page=admin&action=validComment">Confirmer</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
    <div class="content"><?= $content ?></div>
</main>
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
<script src="../public/js/app.js"></script>
</body>
</html>