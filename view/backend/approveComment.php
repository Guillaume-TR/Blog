<?php $this->title = 'Approuver un commentaire'; ?>
<header id="head" class="secondary"></header>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=admin">Panel d'administration</a></li>
            <li class="breadcrumb-item"><a href="index.php?page=admin&action=comment">Gérez les commentaires</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $this->title ?></li>
        </ol>
    </nav>
    <header class="page-header">
        <h1 class="page-title"><?= $this->title ?></h1>
    </header>
    <hr>

	<?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['messageType'] ?>" role="alert">
			<?php
			echo $_SESSION['message'];
			unset($_SESSION['message'], $_SESSION['messageType']);
			?>
        </div>
	<?php } ?>
    <div class="alert alert-info" role="alert">
        <strong>Pseudo : </strong><?= htmlspecialchars($comment->getPseudo()) ?>
    </div>

    <div class="alert alert-info" role="alert">
        <p class="mb-1"><strong>Contenu du commentaire</strong></p>
        <?= htmlspecialchars($comment->getcontent()) ?>
    </div>

    <form method="post" action="index.php?page=admin&action=approveComment&id=<?= $comment->getId() ?>">
        <input class="btn btn-success" type="submit" name="submit" value="Approuver">
    </form>
</div>
