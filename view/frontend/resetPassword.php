<?php $this->title = 'Réinitialisation du mot de passe'; ?>
<header id="head" class="jumbotron"></header>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $this->title ?></li>
        </ol>
    </nav>
    <header class="page-header">
        <h1 class="page-title text-center">Changer votre mot de passe</h1>
    </header>
    <div class="col-sm-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <hr>
                <form method="post" action="index.php?page=resetPassword&key=<?= $key ?>">

                    <div class="top-margin">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="******">
                    </div>

                    <div class="top-margin">
                        <label for="confirm">Confirmer</label>
                        <input type="password" class="form-control" id="confirm" name="confirm"
                               placeholder="******">
                    </div>

                    <hr>

					<?php if (isset($_SESSION['message'])) { ?>
                        <div class="alert alert-<?= $_SESSION['messageType'] ?>" role="alert">
							<?php
							echo $_SESSION['message'];
							unset($_SESSION['message'], $_SESSION['messageType']);
							?>
                        </div>
					<?php } ?>

                    <div class="text-center">
                        <input type="submit" name="submit" class="btn btn-info btn-lg" value="Valider">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
