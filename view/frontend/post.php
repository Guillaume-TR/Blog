<?php
/** @var object $post */
/** @var object $comments */
/** @var object $comment */

$this->title = htmlspecialchars($post->getTitle());  ?>

    <h1><?= htmlspecialchars($post->getTitle()) ?></h1>
	<p><?= htmlspecialchars($post->getContent()) ?></p>
	<p><em>Créé le : <?= htmlspecialchars($post->getCreationDate()) ?></em></p>
	<p><em><strong> Par <?= htmlspecialchars($post->getAuthor()) ?></strong></em></p><?php

	?>
<hr>
<h3>Commentaires</h3>
<?php foreach ($comments as $comment):?>
    <div style="background-color: #CCCCCC; padding-left: 20px;">
        <strong><?= htmlspecialchars($comment->getAuthor()) ?></strong>
		<p><?= htmlspecialchars($comment->getContent()) ?></p>
		<p><em>Créé le : <?= htmlspecialchars($comment->getCreationDate()) ?></em></p>

    </div>
<?php endforeach; ?>