<?php $this->title = 'Accueil'; ?>

<h3 class="text-center my-3">Bienvenue !</h3>
<div class="d-flex flex-column">
	<?php foreach ($books as $book): ?>
        <a class="btn-book btn btn-success my-2 py-3" href="index.php?page=book&id=<?= $book->getId() ?>"><?= $book->getName() ?></a>
	<?php endforeach;?>
</div>
