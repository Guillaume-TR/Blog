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
			} ?>" id="nav-book<?= $book->getId() ?>-tab" data-toggle="tab" href="#nav-book<?= $book->getId() ?>"
               role="tab" aria-controls="nav-book<?= $book->getId() ?>" aria-selected="true">
				<?= $book->getName() ?>
            </a>
		<?php endforeach; ?>
        <a class="nav-item nav-link" id="nav-comments-tab" data-toggle="tab" href="#nav-comments" role="tab"
           aria-controls="nav-comments" aria-selected="false">Commentaires</a>
        <a class="nav-item nav-link" id="nav-accounts-tab" data-toggle="tab" href="#nav-accounts" role="tab"
           aria-controls="nav-accounts" aria-selected="false">Utilisateurs</a>
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
                <a class="btn btn-success" href="index.php?page=admin&action=addEpisode&id=<?= $book->getId() ?>">Ajouter
                    un épisode</a>
            </div>
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
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
                            <td><?= substr($episode->getContent(), 0, 150) . '...' ?></td>
                            <td class="text-center">
                                <a class="btn btn-primary mb-2"
                                   href="index.php?page=admin&action=editEpisode&id=<?= $episode->getId() ?>">Modifier</a><br>
                                <a class="btn btn-danger"
                                   href="index.php?page=admin&action=deleteEpisode&id=<?= $episode->getId() ?>">Supprimer</a>
                            </td>
                        </tr>
					<?php } ?>
				<?php endforeach; ?>
                </tbody>
            </table>
        </div>
	<?php endforeach; ?>
    <div class="tab-pane fade" id="nav-comments" role="tabpanel" aria-labelledby="nav-comments-tab">
        <div class="accordion" id="accordion">
            <div class="card">
                <div class="card-header" id="heading1">
                    <h5 class="mb-0 text-center">
                        <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#collapse1"
                                aria-expanded="true" aria-controls="collapse1">
                            Commentaires signalé
                        </button>
                    </h5>
                </div>
                <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordion">
                    <div class="card-body">
						<?php foreach ($reportComments as $reportComment): ?>
                            <div class="comment-content d-flex bd-highlight py-2">
                                <div class="p-2 flex-grow-1 bd-highlight">
                                    <p><strong><?= htmlspecialchars($reportComment->getAuthor()) ?></strong></p>
                                    <p class="mb-0"><?= htmlspecialchars($reportComment->getContent()) ?></p>
                                </div>
                                <div class="p-2 bd-highlight align-self-center">
                                    <a class="btn btn-danger"
                                       href="index.php?page=admin&action=editComment&id=<?= $reportComment->getId() ?>">Modifier</a>
                                    <a class="btn btn-danger"
                                       href="index.php?page=admin&action=deleteComment&id=<?= $reportComment->getId() ?>">Supprimer</a>
                                </div>
                            </div>
						<?php endforeach;
						if (count($reportComments) < 1) { ?>
                            <div class="alert alert-info" role="alert">
                                Il n'y a aucun commentaire signalé.
                            </div>
						<?php } ?>
                    </div>
                </div>
            </div>
			<?php
			$count = 2;
			foreach ($books as $book):
				foreach ($episodes as $episode):
					if ($episode->getBook() === $book->getId()) { ?>
                        <div class="card">
                            <div class="card-header" id="heading<?= $count ?>">
                                <h5 class="mb-0 text-center">
                                    <button class="btn btn-light collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapse<?= $count ?>" aria-expanded="false"
                                            aria-controls="collapse<?= $count ?>">
										<?= $book->getName() . ' - ' . $episode->getTitle() ?>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse<?= $count ?>" class="collapse" aria-labelledby="heading<?= $count ?>"
                                 data-parent="#accordion">
                                <div class="card-body">
									<?php
									$countComments = 0;
									foreach ($comments as $comment):
										if ($comment->getEpisode() === $episode->getId()) {
											$countComments++;
											?>
                                            <div class="comment-content d-flex bd-highlight py-2">
                                                <div class="p-2 flex-grow-1 bd-highlight">
                                                    <p><strong><?= htmlspecialchars($comment->getAuthor()) ?></strong>
                                                    </p>
                                                    <p class="mb-0"><?= htmlspecialchars($comment->getContent()) ?></p>
                                                </div>
                                                <div class="p-2 d-flex flex-column align-self-center">
                                                    <a class="mb-2 btn btn-primary"
                                                       href="index.php?page=admin&action=editComment&id=<?= $comment->getId() ?>">Modifier</a>
                                                    <a class="btn btn-danger"
                                                       href="index.php?page=admin&action=deleteComment&id=<?= $comment->getId() ?>">Supprimer</a>
                                                </div>
                                            </div>
										<?php }
									endforeach;
									if ($countComments < 1) { ?>
                                        <div class="alert alert-info" role="alert">
                                            Il n'y a aucun commentaire.
                                        </div>
									<?php } ?>
                                </div>
                            </div>

                        </div>
						<?php $count++;
					} ?>
				<?php
				endforeach;
			endforeach; ?>
        </div>
    </div>
    <div class="tab-pane fade" id="nav-accounts" role="tabpanel" aria-labelledby="nav-accounts-tab">
        <div class="pb-3 pl-2">
            <a class="btn btn-success" href="index.php?page=admin&action=addAccount">Ajouter
                un utilisateur</a>
        </div>
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom d'utilisateur</th>
                <th scope="col">Permission</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
			<?php foreach ($accounts as $account):
				if ($account->getLevel() === '1') {
					$accountLevel = 'Utilisateur';
				} elseif ($account->getLevel() === '2') {
					$accountLevel = 'Administrateur';
				}
				?>
                <tr>
                    <th scope="row"><?= $account->getId() ?></th>
                    <td><?= $account->getUser() ?></td>
                    <td><?= $accountLevel ?></td>
                    <td class="text-center">
                        <a class="btn btn-primary mb-2"
                           href="index.php?page=admin&action=editAccount&id=<?= $account->getId() ?>">Modifier</a><br>
                        <a class="btn btn-danger"
                           href="index.php?page=admin&action=deleteAccount&id=<?= $account->getId() ?>">Supprimer</a>
                    </td>
                </tr>
			<?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>