<?php
/** @var object $post */
/** @var object $posts */

$this->title = 'Toutes les publications';

foreach ($posts as $post): ?>
    <h1><a href="index.php?page=post&id=<?= htmlspecialchars($post->getId()) ?>"><?= htmlspecialchars($post->getTitle()) ?></a></h1>
	<p class="post-content-view" style="text-align: justify;"><?= $post->getContent() ?></p>
	<p class="post-date-view"><em>Publié le <?= htmlspecialchars($post->getCreationDate()) ?></em></p>
    <hr>
<?php endforeach;