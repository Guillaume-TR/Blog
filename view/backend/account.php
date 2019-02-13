<?php $this->title = 'Gérez les utilisateurs'; ?>
<header id="head" class="secondary"></header>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=admin">Panel d'administration</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $this->title ?></li>
        </ol>
    </nav>
    <article class="col-md-12 maincontent">
        <header class="page-header">
            <h1 class="page-title"><?= $this->title ?></h1>
        </header>
        <div class="text-center mt-4 mb-2">
            <a href="index.php?page=admin&action=addAccount" class="nav-link btn btn-success">Ajouter un nouvel utilisateur</a>
        </div>
        <div class="d-flex flex-wrap justify-content-center">
			<?php foreach ($accounts as $account): ?>
                <div class="card bg-light m-3 text-center" style="width: 270px;">
                    <div class="card-header">
						<?php if ($account->getLevel() === '1') {
							echo 'Utilisateur';
						} else if ($account->getLevel() === '2') {
							echo 'Administrateur';
						} ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $account->getUser(); ?></h5>
                        <div class="d-flex flex-wrap justify-content-around">
                            <a href="index.php?page=admin&action=editAccount&id=<?= $account->getId(); ?>" class="btn btn-info mt-2 mx-2">Modifier</a>
                            <a href="index.php?page=admin&action=deleteAccount&id=<?= $account->getId(); ?>" class="btn btn-danger mt-2 mx-2">Supprimer</a>
                        </div>
                    </div>
                </div>
			<?php endforeach; ?>
        </div>
    </article>
</div>