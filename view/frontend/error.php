<?php
$title = 'Erreur !';

ob_start();
?>
    <h1>Erreur !</h1>
<?= $error; ?>
    <p><a href="../public/index.php">Revenir à la page d'accueil</a></p>
<?php
$content = ob_get_clean();

require '../view/public_template.php';
?>