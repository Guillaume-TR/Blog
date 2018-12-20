<?php $this->title = 'Mot de passe oublié'; ?>

<header id="head" class="secondary"></header>

<div class="container">
	<ol class="breadcrumb">
		<li><a href="index.php">Accueil</a></li>
		<li class="active"><?= $this->title ?></li>
	</ol>
	<div class="row">
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title"><?= $this->title ?></h1>
				</header>
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<form method="post" action="index.php?page=forgotPassword">
								<div class="top-margin">
									<label for="email">E-mail</label>
									<input type="email" class="form-control" id="email" name="email"
										   placeholder="Votre adresse mail">
								</div>

								<hr>

								<?php if (isset($_SESSION['message'])) { ?>
									<div class="alert alert-<?= $_SESSION['messageType'] ?>" role="alert">
										<?php
										echo $_SESSION['message'];
										unset($_SESSION['message'], $_SESSION['messageType']);
										?>
									</div>
								<?php } ?>

								<div class="row">
									<div class="col-lg-offset-3 col-lg-6 text-center">
										<input type="submit" name="submit" class="btn btn-action" value="Valider">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</article>
	</div>
</div>
