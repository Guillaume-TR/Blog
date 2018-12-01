<?php
/** @var object $post */
/** @var object $posts */

$this->title = 'Tous les articles';

foreach ($posts as $post): ?>

	<h1><a href="index.php?page=post&id=<?= htmlspecialchars($post->getId()) ?>"><?= htmlspecialchars($post->getTitle()) ?></a></h1>
	<p><?= htmlspecialchars($post->getContent()) ?></p>
	<p><em><strong> Par <?= htmlspecialchars($post->getAuthor()) ?></strong> - <?= htmlspecialchars($post->getCreationDate()) ?></em></p>
<hr>
<?php endforeach;
