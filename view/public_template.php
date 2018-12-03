<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSS -->
    <link rel="stylesheet" href="../public/css/style.css">

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
    <div class="content">
		<?= $content ?>
    </div>
</main>
</body>
</html>