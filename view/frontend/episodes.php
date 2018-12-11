<?php
/** @var object $episodes
 ** @var object $episode
 ** @var object $comments
 ** @var object $comment
 **/
$this->title = 'Toutes les publications'; ?>

<h2 class="text-center py-2">Billet simple pour l'Alaska</h2>
<ul class="nav nav-pills mb-3 py-2" id="pills-tab" role="tablist">
	<?php
	$active = true;
	$number = 1;
	foreach ($episodes as $episode): ?>
        <li class="nav-item">
            <a class="nav-link<?php
			if ($active) {
				echo ' active';
				$active = false;
			} ?>" id="pills-<?= $episode->getId() ?>-tab" data-toggle="pill"
               href="#pills-<?= $episode->getId() ?>" role="tab"
               aria-controls="pills-<?= $episode->getId() ?>" aria-selected="true">
				<?= $number . '. ' . $episode->getTitle() ?>
            </a>
        </li>
		<?php
		$number++;
	endforeach; ?>
</ul>
<div class="tab-content" id="pills-tabContent">
	<?php
	$active = true;
	foreach ($episodes as $episode): ?>
        <div class="tab-pane fade show<?php
		if ($active) {
			echo ' active';
			$active = false;
		} ?>" id="pills-<?= $episode->getId() ?>" role="tabpanel"
             aria-labelledby="pills-<?= $episode->getId() ?>-tab">
			<?= $episode->getContent() ?>
            <hr>
            <div>
                <p class="text-center">
                    <button class="btn btn-dark mb-2" type="button" data-toggle="collapse" data-target="#comments"
                            aria-expanded="false" aria-controls="comments">
                        Afficher les commentaires
                    </button>
                </p>
                <div class="collapse" id="comments">
                    <div class="card py-3">
						<?php
						$count = 0;
						foreach ($comments as $comment):
							if ($comment->getEpisode() === $episode->getId()) {
								$count++;
								?>
                                <div class="comment-content mx-3">
                                    <div class="p-2">
                                        <p><strong><?= htmlspecialchars($comment->getAuthor()) ?></strong></p>
										<?= htmlspecialchars($comment->getContent()) ?>
										<?php if ($comment->getEdited()) { ?>
                                            <div class="comment-edited">Commentaire édité par l'admin</div>
										<?php } ?>
                                    </div>
                                    <div class="d-flex justify-content-between my-2">
                                        <em><?= $comment->getDate() ?></em>
                                        <a href="index.php?page=episodes&report=<?= $comment->getId() ?>"
                                           title="Signaler"><i class="fas fa-exclamation-circle"></i></a>
                                    </div>
                                </div>
								<?php
							}
						endforeach;
						if ($count <= 0) {
							?>
                            <div class="alert alert-secondary mx-3 mt-2" role="alert">
                                Il n'y a aucun commentaire.
                            </div><?php
						} ?>
                    </div>
                </div>
                <hr>
				<?php
				if (isset($message)) {
					?>
                    <div class="alert alert-<?= $messageType ?>" role="alert">
					<?= $message ?>
                    </div><?php
				}
				?>
                <h3 class="py-2">Ajouter un commentaire</h3>
                <form class="mb-3" method="post" action="index.php?page=episodes">
                    <div class="form-group">
                        <label for="author">Prénom</label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="Votre prénom">
                        <label for="messsage">Message</label>
                        <textarea id="messsage" class="form-control" name="content"
                                  placeholder="Votre message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary text-center" name="submit"
                            value="<?= $episode->getId() ?>">Envoyer
                    </button>
                </form>
            </div>
        </div>
	<?php endforeach; ?>
</div>
