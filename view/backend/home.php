<?php
/** Variables
 * @var array $episodes
 * @var array $episode
 *
 * @var array $accounts
 * @var array $account
 *
 * @var array $comments
 * @var array $comment
 *
 * @var array $reportComments
 * @var array $reportComment
 */

$this->title = 'Panel d\'administration';
?>

<div class="mt-3">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-book-1-tab" data-toggle="tab" href="#nav-book-1" role="tab"
           aria-controls="nav-book-1" aria-selected="true">Épisodes </a>
        <a class="nav-item nav-link" id="nav-comments-tab" data-toggle="tab" href="#nav-comments" role="tab"
           aria-controls="nav-comments" aria-selected="false">Commentaires</a>
        <a class="nav-item nav-link" id="nav-accounts-tab" data-toggle="tab" href="#nav-accounts" role="tab"
           aria-controls="nav-accounts" aria-selected="false">Utilisateurs</a>
    </div>
</div>
<div class="tab-content mt-3" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-book-1" role="tabpanel" aria-labelledby="nav-book-1-tab">
            <div class="pb-3 pl-2">
                <a class="btn btn-success" href="index.php?page=admin&action=addEpisode">Ajouter
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
				<?php foreach ($episodes as $episode): ?>
                        <tr>
                            <th scope="row"><?= $episode->getId() ?></th>
                            <td><?= $episode->getTitle() ?></td>
                            <td><?php
								if (strlen($episode->getContent()) > 155) {
									echo substr($episode->getContent(), 0, 150) . '...';
								} else {
									echo $episode->getContent();
								} ?></td>
                            <td class="text-center">
                                <a class="btn btn-primary mb-2"
                                   href="index.php?page=admin&action=editEpisode&id=<?= $episode->getId() ?>">Modifier</a><br>
                                <a class="btn btn-danger"
                                   href="index.php?page=admin&action=deleteEpisode&id=<?= $episode->getId() ?>">Supprimer</a>
                            </td>
                        </tr>
				<?php endforeach; ?>
                </tbody>
            </table>
        </div>
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
                                <div class="p-2 d-flex flex-column align-self-center">
                                    <a class="mb-2 btn btn-success"
                                       href="index.php?page=admin&action=approveComment&id=<?= $reportComment->getId() ?>">Approuver</a>
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
				foreach ($episodes as $episode):?>
                    <div class="card">
                            <div class="card-header" id="heading<?= $count ?>">
                                <h5 class="mb-0 text-center">
                                    <button class="btn btn-light collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapse<?= $count ?>" aria-expanded="false"
                                            aria-controls="collapse<?= $count ?>">
										<?= $episode->getTitle() ?>
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