<?php $this->title = 'Modifier l\'utilisateur'; ?>

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

                    <h3 class="thin text-center">Modifier un utilisateur</h3>

                    <hr>

                    <form method="post" action="#">
                        <div class="alert alert-info" role="alert">
                            <strong>Nom d'utilisateur : </strong><?= $account->getUser() ?>
                        </div>

                        <div class="row top-margin">
                            <div class="col-md-6">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <small class="text-muted">Le mot de passe doit comporter au moin 5 caractères.</small>
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

						<?php if (isset($message)) { ?>

                        <div class="alert alert-<?= $messageType ?>" role="alert">
                            <?= $message ?>
                        </div>

                        <?php } ?>

                        <div>
                            <input type="submit" name="submit" class="btn btn-primary" value="Modifier">
                        </div>
                    </form>

                </div>
            </div>

        </article>
    </div>

</div>