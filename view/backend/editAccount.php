<?php $this->title = 'Modifier l\'utilisateur'; ?>
<header id="head" class="secondary"></header>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=admin">Panel d'administration</a></li>
            <li class="breadcrumb-item"><a href="index.php?page=admin&action=account">Gérez les utilisateurs</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $this->title ?></li>
        </ol>
    </nav>
    <header class="page-header">
        <h1 class="page-title"><?= $this->title ?></h1>
    </header>
    <div class="panel panel-default">
        <div class="panel-body">
            <hr>
            <form method="post" action="index.php?page=admin&action=editAccount&id=<?= $account->getId() ?>">
                <div class="alert alert-info" role="alert">
                    <strong>Nom d'utilisateur : </strong><?= $account->getUser() ?>
                </div>
                <div class="top-margin">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email">
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
				<?php if (isset($_SESSION['message'])) { ?>

                    <div class="alert alert-<?= $_SESSION['messageType'] ?> mt-2" role="alert">
						<?php
						echo $_SESSION['message'];
						unset($_SESSION['message'], $_SESSION['messageType']);
						?>
                    </div>

				<?php } ?>
                <div class="mt-3">
                    <input type="submit" name="submit" class="btn btn-info btn-lg" value="Modifier">
                </div>
            </form>
        </div>
    </div>
</div>