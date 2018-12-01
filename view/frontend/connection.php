<?php
$this->title = 'Se connection';
if (isset($_SESSION['id'])) {
    ?>
    <script>window.location = 'index.php?page=home';</script>
    <?php
} else {
	?>
	<form method="post" action="index.php?page=connection">
		<label for="username">Nom d'utilisateur</label><br>
        <input type="text" id="username" name="username"/><br>
		<label for="passwors">Mot de passe</label><br>
        <input type="password" id="password" name="password"/><br>
        <br>
		<input type="submit" id="submit" name="submit"/>
	</form>
	<?php
}