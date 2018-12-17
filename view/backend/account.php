<?php $this->title = 'Gérez les utilisateurs'; ?>

<header id="head" class="secondary"></header>

<div class="container">

	<ol class="breadcrumb">
		<li><a href="index.php?page=admin">Panel d'administration</a></li>
		<li class="active"><?= $this->title ?></li>
	</ol>

	<div class="row">
		<article class="col-md-12 maincontent list-admin">

			<header class="page-header">
				<h1 class="page-title"><?= $this->title ?></h1>
			</header>

			<a href="index.php?page=admin&action=addAccount" class="btn btn-success">Ajouter un utilisateur</a>

			<?php foreach ($accounts as $account): ?>
				<div class="jumbotron top-space text-center">

					<h2><?= $account->getUser(); ?></h2>

					<hr>

                    <p>
                        <?php if ($account->getLevel() === '1') {
                            echo 'Utilisateur';
						} else if ($account->getLevel() === '2') {
							echo 'Administrateur';
						} ?>
                    </p>
					<p>
						<a href="index.php?page=admin&action=editAccount&id=<?= $account->getId(); ?>" class="btn btn-warning">Modifier</a>
						<a href="index.php?page=admin&action=deleteAccount&id=<?= $account->getId(); ?>" class="btn btn-danger">Supprimer</a>
					</p>
				</div>
			<?php endforeach; ?>

		</article>
	</div>

</div>