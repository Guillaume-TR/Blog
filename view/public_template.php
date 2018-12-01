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
</nav>
<main role="main" class="container-fluid">
    <div class="starter-template" style="margin-top: 56px;">
		<?= $content ?>
    </div>
</main>
</body>
</html>