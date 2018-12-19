<?php $this->title = 'Supprimer un utilisateur'; ?>

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

            <div class="alert alert-danger" role="alert">
                <p>Vous êtes sur le point de <strong>supprimer définitivement</strong> un utilisateur.<br>
                    Veuillez noter le nom d'utilisateur pour confirmer la suppression.</p>
            </div>

			<?php if (isset($_SESSION['message'])) {

				if ($_SESSION['messageType'] === 'success') { ?>

                    <div class="alert alert-success" role="alert">
						<?php
						echo $_SESSION['message'];
						unset($_SESSION['message'], $_SESSION['messageType']);
						?>
                    </div>

				<?php } else { ?>

                    <div class="alert alert-info" role="alert">
                        <strong>Nom de l'utilisateur : </strong><?= $account->getUser() ?>
                    </div>

                    <div class="alert alert-<?= $_SESSION['messageType'] ?>" role="alert">
						<?php
						echo $_SESSION['message'];
						unset($_SESSION['message'], $_SESSION['messageType']);
						?>
                    </div>

                    <form method="post" action="index.php?page=admin&action=deleteAccount&id=<?= $account->getId() ?>">
                        <div class="form-group">
                            <input class="form-control" type="text" name="username">
                        </div>
                        <input class="btn btn-danger" type="submit" name="submit" value="Supprimer">
                    </form>

                    <hr>

				<?php }
			} else { ?>

                <div class="alert alert-info" role="alert">
                    <strong>Nom de l'utilisateur : </strong><?= $account->getUser() ?>
                </div>

                <form method="post" action="index.php?page=admin&action=deleteAccount&id=<?= $account->getId() ?>">
                    <div class="form-group">
                        <input class="form-control" type="text" name="username">
                    </div>
                    <input class="btn btn-danger" type="submit" name="submit" value="Supprimer">
                </form>

			<?php } ?>
        </article>
    </div>

</div>