<?php $this->title = 'Ajouter un compte';  ?>
<h2>Ajouter un nouveau compte</h2>
<?php if (isset($message)) {
    echo $message;
} ?>
<form method="post" action="">
    <p>
        <input type="text" id="username" name="username" placeholder="Nom d'utilisateur" aria-label="username" required/>
        <input type="password" id="password" name="password" placeholder="Mot de passe" aria-label="password" required/>
        <select id="level" name="level" required>
            <option value="1" selected>Type</option>
            <option value="1">Normal</option>
            <option value="2">Admin</option>
        </select>
        <input type="submit" id="submit" name="submit" value="Ajouter"/>
    </p>
</form>