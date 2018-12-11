<?php
$title = 'Page non trouvé !';

ob_start();
?>
    <h1>Page non trouvé !</h1>
    <p><a href="../public/index.php">Revenir à la page d'accueil</a></p>
<?php
$content = ob_get_clean();

require '../view/template.php';
?>