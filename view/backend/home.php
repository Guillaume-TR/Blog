<?php
$this->title = 'Panel d\'administration';
?>

<div class="mt-3">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
		<?php $active = true;
        foreach ($books as $book): ?>
            <a class="nav-item nav-link<?php
            if ($active) {
                echo ' active';
                $active = false;
            } ?>" id="nav-book<?= $book->getId() ?>-tab" data-toggle="tab" href="#nav-book<?= $book->getId() ?>" role="tab" aria-controls="nav-book<?= $book->getId() ?>" aria-selected="true">
				<?= $book->getName() ?>
            </a>
		<?php endforeach; ?>
        <a class="nav-item nav-link" id="nav-accounts-tab" data-toggle="tab" href="#nav-accounts" role="tab" aria-controls="nav-accounts" aria-selected="false">Utilisateurs</a>
    </div>
</div>
<div class="tab-content mt-3" id="nav-tabContent">
	<?php
	$active = true;
	foreach ($books as $book): ?>
    <div class="tab-pane fade<?php
	if ($active) {
		echo ' show active';
		$active = false;
	} ?>" id="nav-book<?= $book->getId() ?>" role="tabpanel" aria-labelledby="nav-book<?= $book->getId() ?>-tab">
        <div class="pb-3 pl-2">
            <a class="btn btn-success" href="index.php?page=admin&action=addEpisode&id=<?= $book->getId() ?>">Ajouter un episode</a>
        </div>
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Titre</th>
                <th scope="col">Contenu</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
			<?php foreach ($episodes as $episode):
            if ($episode->getBook() === $book->getId()) { ?>
                <tr>
                    <th scope="row"><?= $episode->getId() ?></th>
                    <td><?= $episode->getTitle() ?></td>
                    <td><?= substr($episode->getContent(), 0, 50) . '...' ?></td>
                    <td>
                        <a class="btn btn-primary mb-2" href="index.php?page=admin&action=editEpisode&id=<?= $episode->getId() ?>">Modifier</a><br>
                        <a class="btn btn-danger" href="index.php?page=admin&action=deleteEpisode&id=<?= $episode->getId() ?>">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
			<?php endforeach; ?>
            </tbody>
        </table>
    </div>
	<?php endforeach; ?>
    <div class="tab-pane fade" id="nav-accounts" role="tabpanel" aria-labelledby="nav-accounts-tab">...</div>
</div>