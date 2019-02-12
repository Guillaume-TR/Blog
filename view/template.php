<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jean Forteroche | <?= $title ?></title>

    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">

    <!-- Custom styles -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="home">
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container py-3">
        <a class="navbar-brand" href="#">Jean Forteroche</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active"><a class="nav-link" href="index.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?page=episodes">Tous les épisodes</a></li>
				<?php if (isset($_SESSION['level'])) {
					    if ($_SESSION['level'] === '2') { ?>
                        <li><a class="btn btn-outline-primary m-1" href="index.php?page=admin"><strong>Espace admin</strong></a></li>
					<?php } ?>
                    <li><a class="btn btn-outline-danger m-1" href="index.php?page=disconnect"><strong>Se deconnecter</strong></a></li>
				<?php } else { ?>
                    <li><a class="btn btn-outline-success m-1" href="index.php?page=connection"><strong>Se connecter</strong></a></li>
				<?php } ?>
            </ul>
        </div>
    </div>
</nav>

<div>
	<?= $content ?>
</div>

<?php if (!isset($_GET['page']) ||
          (isset($_GET['page']) && $_GET['page'] !== 'admin')) { ?>
    <footer id="footer" class="top-space">
        <div class="footer1">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 widget">
                        <h3 class="widget-title">Contact</h3>
                        <div class="widget-body">
                            <p>06 12 34 56 78<br>
                                <a href="mailto:#">jean-forteroche@email.fr</a><br>
                                <br>
                                23 boulvard des chants<br>
                                Nantes, 44100
                            </p>
                        </div>
                    </div>
                    <div class="col-md-8 widget">
                        <h3 class="widget-title">À propos de Jean Forteroche</h3>
                        <div class="widget-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusdam
                                architecto voluptatem amet fugiat nesciunt placeat provident cumque accusamus itaque
                                voluptate modi quidem dolore optio velit hic iusto vero praesentium repellat commodi ad
                                id
                                expedita cupiditate repellendus possimus unde?</p>
                            <p>Eius consequatur nihil quibusdam! Laborum, rerum, quis, inventore ipsa autem repellat
                                provident assumenda labore soluta minima alias temporibus facere distinctio quas
                                adipisci
                                nam sunt explicabo officia tenetur at ea quos doloribus dolorum voluptate reprehenderit
                                architecto sint libero illo et hic.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 widget">
                        <div class="widget-body">
                            <p class="simplenav">
                                <a href="index.php">Accueil</a> |
                                <a href="index.php?page=episodes">Tous les épisodes</a> |
								<?php if (isset($_SESSION['level'])) { ?>
                                    <?php if ($_SESSION['level'] === '2') { ?>
                                        <b><a href="index.php?page=admin">Espace admin</a></b> |
                                    <?php } ?>
                                    <b><a href="index.php?page=disconnect">Se deconnecter</a></b>
								<?php } else { ?>
                                    <b><a href="index.php?page=connection">Se connecter</a></b>
								<?php } ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 widget">
                        <div class="widget-body">
                            <p class="text-right">
                                Copyright &#169; 2019, Jean Forteroche. Design de <a href="http://gettemplate.com/">gettemplate</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php } ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<!-- Custom scripts -->
<script src="assets/js/headroom.min.js"></script>
<script src="assets/js/jQuery.headroom.min.js"></script>
<script src="assets/js/template.js"></script>
<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>

<script>
    tinymce.init({
        selector: '.tiny-editor',
        language: 'fr_FR',
        language_url: '../public/assets/js/tinymce/langs/fr_FR.js',
        min_height: 250,
    });
</script>
</body>
</html>