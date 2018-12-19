<?php $this->title = 'Ajouter un utilisateur'; ?>

<header id="head" class="secondary"></header>

<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.php?page=admin">Panel d'administration</a></li>
        <li><a href="index.php?page=admin&action=account">Gérez les utilisateurs</a></li>
        <li class="active"><?= $this->title ?></li>
    </ol>

    <div class="row">
        <article class="col-md-12 maincontent">

            <header class="page-header">
                <h1 class="page-title"><?= $this->title ?></h1>
            </header>

            <div class="panel panel-default">
                <div class="panel-body">

                    <h3 class="thin text-center">Enregister un utilisateur</h3>

                    <hr>

                    <form method="post" action="index.php?page=admin&action=addAccount">
                        <div class="top-margin">
                            <label for="username">Nom d'utilisateur</label>
                            <input type="text" class="form-control" id="username" name="username">
                            <small class="text-muted">Le nom d'utilisateur doit comporter au moins 5 caractères.</small>
                        </div>

                        <div class="row top-margin">
                            <div class="col-md-6">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <small class="text-muted">Le mot de passe doit comporter au moins 5 caractères.</small>
                            </div>
                            <div class="col-md-6">
                                <label for="confirm">Confirmer</label>
                                <input type="password" class="form-control" id="confirm" name="confirm">
                                <small class="text-muted">Doit être identique au mot de passe.</small>
                            </div>
                        </div>
                        <div class="top-margin">
                            <label for="level">Permission</label>
                            <select class="form-control" id="level" name="level">
                                <option selected>Choisissez...</option>
                                <option value="1">Utilisateur</option>
                                <option value="2">Administrateur</option>
                            </select>
                        </div>
                        <small class="text-muted">Choisissez les permissions accordées au compte.</small>

                        <hr>

						<?php if (isset($_SESSION['message'])) { ?>
                            <div class="alert alert-<?= $_SESSION['messageType'] ?>" role="alert">
								<?php
								echo $_SESSION['message'];
								unset($_SESSION['message'], $_SESSION['messageType']);
								?>
                            </div>
						<?php } ?>
                            <div>
                                <input type="submit" name="submit" class="btn btn-success" value="Enregistrer">
                            </div>
                    </form>
                </div>
            </div>
        </article>
    </div>

</div>