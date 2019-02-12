<?php

namespace App\app\controller;

use App\app\manager\EpisodeManager;
use App\app\manager\CommentManager;
use App\app\manager\AccountManager;
use App\app\model\View;

/** Front controller
 * Class BackController
 * @package App\app\controller
 */
class FrontController
{
	private $episodeManage;
	private $commentManage;
	private $accountManage;
	private $view;

	public function __construct()
	{
		$this->episodeManage = new EpisodeManager();
		$this->commentManage = new CommentManager();
		$this->accountManage = new AccountManager();
		$this->view = new View();
	}

	/** Home page
	 *
	 */
	public function home()
	{
		$requestLastEpisode = $this->episodeManage->getLastEpisode();

		$this->view->render('home', [
			'lastEpisode' => $requestLastEpisode
		]);
	}

	/** Episodes page
	 *
	 */
	public function episodes()
	{
		$requestEpisodes = $this->episodeManage->getEpisodes();

		$this->view->render('episodes', [
			'episodes' => $requestEpisodes
		]);
	}

	/** Single episode page
	 * @param $idEpisode
	 * @param $data
	 */
	public function episode($idEpisode, $data)
	{
		extract($data);

		$requestEpisode = $this->episodeManage->getEpisode($idEpisode);
		$requestCount = $requestEpisode->rowCount();

		if ($requestCount === 1) {
			$requestEpisode = $requestEpisode->fetch();
			if (isset($submit)) {
				if (isset($pseudo) && strlen($pseudo) > 0) {
					if (isset($content) && strlen($content) > 0) {
						$request = $this->commentManage->addComment($idEpisode, $_POST);

						$_SESSION['message'] = 'Le commentaire à bien été ajouté !';
						$_SESSION['messageType'] = 'success';
					} else {
						$_SESSION['message'] = 'Le contenu de votre message est vide.';
						$_SESSION['messageType'] = 'danger';
					}
				} else {
					$_SESSION['message'] = 'Indiquez votre prénom.';
					$_SESSION['messageType'] = 'danger';
				}
			}
			if (isset($reportComment)) {
				$commentId = (int)$reportComment;
				$request = $this->commentManage->reportComment($commentId);

				$_SESSION['message'] = 'Le commentaire à bien été signalé !';
				$_SESSION['messageType'] = 'info';
			}
			$requestComments = $this->commentManage->getComments($idEpisode);
			$requestComments = $requestComments->fetchAll();

			$this->view->render('episode', [
				'episode' => $requestEpisode,
				'comments' => $requestComments
			]);
		} else {
			$this->view->render('notFound', []);
		}
	}

	/** Connection page
	 * @param $data
	 */
	public function connection($data)
	{
		extract($data);
		$requestConnection = null;

		if (isset($submit)) {
			$request = $this->accountManage->checkAccount($username);
			$countGet = $request->rowCount();

			if (isset($countGet) && $countGet === 1) {
				$requestConnection = $request->fetch();

				$passwordCheck = password_verify($password, $requestConnection->getPass());

				if ($passwordCheck) {
					$_SESSION['id'] = $requestConnection->getId();
					$_SESSION['username'] = $requestConnection->getUser();
					$_SESSION['level'] = $requestConnection->getLevel();

				} else {
					$_SESSION['message'] = 'Nom d\'utilisateur ou mot de passe incorrect';
					$_SESSION['messageType'] = 'danger';
				}
			} else {
				$_SESSION['message'] = 'Nom d\'utilisateur ou mot de passe incorrect';
				$_SESSION['messageType'] = 'danger';
			}
		}
		$this->view->render('connection', [
			'connection' => $requestConnection
		]);
	}

	/** Forgot password page
	 * @param $data
	 */
	public function forgotPassword($data)
	{
		extract($data);
		$requestConnection = null;

		if (isset($submit)) {
			if (isset($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$request = $this->accountManage->checkAccountByEmail($email);
				$countGet = $request->rowCount();

				if ($countGet === 1) {
					$requestAccount = $request->fetch();
					$idAccount = $requestAccount->getId();

					$ticket = hash('sha512', session_id() . microtime() . rand(0, 999999999));

					$request = $this->accountManage->addTicket($ticket, $idAccount);

					$to = $email;
					$subject = 'Oublie de mot de passe | Takokaku.fr';

					$message = '<html>';
					$message .= '<head>';
					$message .= '<title>Oublie de mot de passe</title>';
					$message .= '</head>';
					$message .= '<body>';
					$message .= '<p>Voici le lien :</p>';
					$message .= '<a href="https://takokaku.fr/index.php?page=resetPassword&key=' . $ticket . '">Reinitialiser</a>';
					$message .= '</body>';
					$message .= '</html>';

					$headers[] = 'MIME-Version: 1.0';
					$headers[] = 'Content-type: text/html; charset=iso-8859-1';

					$headers[] = 'From: Admin <takokaku@website.fr>';

					mail($to, $subject, $message, implode("\r\n", $headers));

					$_SESSION['message'] = 'Vous allez recevoir par email un lien pour réinitialiser votre mot de passe.';
					$_SESSION['messageType'] = 'success';
				} else {
					$_SESSION['message'] = 'Aucun compte n\'est associé à cette email.';
					$_SESSION['messageType'] = 'danger';
				}
			} else {
				$_SESSION['message'] = 'L\email n\'est pas valide';
				$_SESSION['messageType'] = 'danger';
			}
		}
		$this->view->render('forgotPassword', [
		]);
	}

	/** Reset password page
	 * @param $key
	 * @param $data
	 */
	public function resetPassword($key, $data)
	{
		extract($data);

		$request = $this->accountManage->checkTicket($key);
		$countGet = $request->rowCount();

		if ($countGet === 1) {
			if ($submit) {
				if ($password === $confirm) {
					$request = $this->accountManage->changePassword($data, $key);

					$_SESSION['message'] = 'Mot de passe changer';
					$_SESSION['messageType'] = 'success';
				} else {
					$_SESSION['message'] = 'Verifiez que les mots de passe contiennent au moins 5 caractères et qu\'ils sont identiques.';
					$_SESSION['messageType'] = 'danger';
				}
			}
			$this->view->render('resetPassword', [
				'key' => $key
			]);
		}  else {
			$this->view->render('notFound', []);
		}
	}

	/** Disconnect page
	 *
	 */
	public function disconnect()
	{
		session_destroy();

		$this->view->render('disconnect', []);
	}
}