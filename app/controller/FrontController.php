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
		$message = null;
		$messageType = null;
		if (isset($submit)) {
			if (isset($author) && strlen($author) > 0) {
				if (isset($content) && strlen($content) > 0) {
					$request = $this->commentManage->addComment($idEpisode, $_POST);
					$message = 'Le commentaire à bien été ajouté !';
					$messageType = 'success';
				} else {
					$message = 'Le contenu de votre message est vide.';
					$messageType = 'danger';
				}
			} else {
				$message = 'Indiquez votre prénom.';
				$messageType = 'danger';
			}
		}
		if (isset($_GET['report'])) {
			$commentId = (int)$_GET['report'];
			$request = $this->commentManage->reportComment($commentId);
			$message = 'Le commentaire à bien été signalé !';
			$messageType = 'info';
		}
		$requestEpisode = $this->episodeManage->getEpisode($idEpisode);
		$requestEpisode = $requestEpisode->fetch();
		$requestComments = $this->commentManage->getComments($idEpisode);
		$requestComments = $requestComments->fetchAll();
		$this->view->render('episode', [
			'episode' => $requestEpisode,
			'comments' => $requestComments,
			'message' => $message,
			'messageType' => $messageType
		]);
	}

	/** Connection page
	 * @param $data
	 */
	public function connection($data)
	{
		extract($data);
		$message = null;
		$messageType = null;
		$requestConnection = null;

		if (isset($submit)) {
			/** @var string $username */
			$request = $this->accountManage->checkAccount($username);
			$countGet = $request->rowCount();

			if (isset($countGet) && $countGet === 1) {
				$requestConnection = $request->fetch();
				/** @var string $password */
				$passwordCheck = password_verify($password, $requestConnection->getPass());

				if ($passwordCheck) {
					$_SESSION['id'] = $requestConnection->getId();
					$_SESSION['username'] = $requestConnection->getUser();
					$_SESSION['level'] = $requestConnection->getLevel();

				} else {
					$message = 'Nom d\'utilisateur ou mot de passe incorrect';
					$messageType = 'danger';
				}
			} else {
				$message = 'Nom d\'utilisateur ou mot de passe incorrect';
				$messageType = 'danger';
			}
		}
		$this->view->render('connection', [
			'connection' => $requestConnection,
			'message' => $message,
			'messageType' => $messageType
		]);
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