<?php $this->title = 'Ajouter un épisode'; ?>

<header id="head" class="secondary"></header>

<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.php?page=admin">Panel d'administration</a></li>
        <li><a href="index.php?page=admin&action=episode">Gérez les épisodes</a></li>
        <li class="active"><?= $this->title ?></li>
    </ol>

    <div class="row">
        <article class="col-md-12 maincontent">

            <header class="page-header">
                <h1 class="page-title"><?= $this->title ?></h1>
            </header>

            <form method="post" action="index.php?page=admin&action=addEpisode">
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Titre de l'épisode"<?php
					if (isset($_POST['title'])) {
						echo ' value="' . $_POST['title'] . '"';
					} ?>>
                </div>
                <div class="form-group">
                    <label for="content">Contenu</label>
                    <textarea class="tiny-editor" id="content" name="content"><?php if (isset($_POST['content'])) {
							echo $_POST['content'];
						} ?></textarea>
                </div>
				<?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['messageType'] ?>" role="alert">
						<?php
						echo $_SESSION['message'];
						unset($_SESSION['message'], $_SESSION['messageType']);
						?>
                    </div>
				<?php } ?>
                <input type="submit" name="submit" class="btn btn-success" value="Ajouter l'épisode">
            </form>

        </article>
    </div>

</div>
