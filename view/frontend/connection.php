<?php $this->title = 'Connection'; ?>

<header id="head" class="secondary"></header>

<div class="container">
    <ol class="breadcrumb">
        <li><a href="index.php">Accueil</a></li>
        <li class="active">Connection</li>
    </ol>
    <div class="row">
		<?php if (!isset($_SESSION['id'])) { ?>
            <article class="col-xs-12 maincontent">
                <header class="page-header">
                    <h1 class="page-title">Connection</h1>
                </header>
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="thin text-center">Connectez-vous à votre compte</h3>
                            <hr>
                            <form method="post" action="#">
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
								<?php if (isset($message)) { ?>
                                    <div class="alert alert-<?= $messageType ?>" role="alert">
										<?= $message ?>
                                    </div>
								<?php } ?>
                                <div class="row">
                                    <div class="col-lg-offset-3 col-lg-6 text-center">
                                        <input type="submit" name="submit" class="btn btn-action" value="Se connecter">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
		<?php
		} else { ?>
            <script>window.location = "index.php?page=admin"</script>
		<?php } ?>
    </div>
</div>
