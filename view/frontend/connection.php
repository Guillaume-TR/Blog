<?php $this->title = 'Se connecter'; ?>
<header id="head" class="jumbotron"></header>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $this->title ?></li>
        </ol>
    </nav>
	<?php if (!isset($_SESSION['id'])) { ?>
        <header class="page-header">
            <h1 class="page-title text-center">Connectez-vous à votre compte</h1>
        </header>
        <div class="col-sm-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <hr>
                    <form method="post" action="index.php?page=connection">
                        <div class="top-margin">
                            <label for="username">Nom d'utilisateur</label>
                            <input type="text" class="form-control" id="username" name="username"
                                   placeholder="Nom d'utilisateur">
                        </div>
                        <div class="top-margin">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password"
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
                                <input type="submit" name="submit" class="btn btn-success btn-lg" value="Se connecter"><br>
                                <a href="index.php?page=forgotPassword">Mot de passe oublié ?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	<?php
	} else { ?>
        <script>window.location = "index.php?page=home"</script>
	<?php } ?>
</div>
