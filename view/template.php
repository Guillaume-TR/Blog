<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/style.css">

    <title>Mon blog | <?= $title ?></title>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Jean Forteroche</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Livres
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php foreach ($books as $book): ?>
                            <a class="dropdown-item"
                               href="index.php?page=book&id=<?= $book->getId() ?>"><?= $book->getName() ?></a>
						<?php endforeach; ?>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
				<?php
                if (isset($_SESSION['level'])) {
					if ($_SESSION['level'] === '2') { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=admin">Espace admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=disconnect">Se déconnecter</a>
                        </li>
					<?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=disconnect">Se déconnecter</a>
                        </li>
					<?php }
				} else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=connection">Se connecter</a>
                    </li>
				<?php } ?>
            </ul>
        </div>
    </nav>
</header>
<body>
<div class="container">
    <div class="content">
		<?= $content ?>
    </div>
</div>
<!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<!-- TinyMCE (WYSIWYG) -->
<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<script>
    tinymce.init({
        selector: '.tiny-editor',
        language: 'fr_FR',
        language_url: '../public/js/tinymce/langs/fr_FR.js',
    });
</script>
<script src="../public/js/app.js"></script>
</body>
</html>