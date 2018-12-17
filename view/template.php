<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jean Forteroche | <?= $title ?></title>

    <link rel="shortcut icon" href="assets/images/favicon.png">

    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Custom styles -->
    <link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="home">

<div class="navbar navbar-inverse navbar-fixed-top headroom">
    <div class="container">
        <div class="navbar-header">
            <!-- Button for mobile version -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="index.php">Jean Forteroche</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php?page=episodes">Tous les épisodes</a></li>
				<?php if (isset($_SESSION['level'])) { ?>
                    <?php if ($_SESSION['level'] === '2') { ?>
                        <li><a class="btn" href="index.php?page=admin">Espace admin</a></li>
                    <?php } ?>
                    <li><a class="btn" href="index.php?page=disconnect">Se deconnecter</a></li>
				<?php } else { ?>
                    <li><a class="btn" href="index.php?page=connection">Se connecter</a></li>
				<?php } ?>
            </ul>
        </div>
    </div>
</div>

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
                                Copyright &#169; 2018, Jean Forteroche. Design de <a href="http://gettemplate.com/">gettemplate</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php } ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

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