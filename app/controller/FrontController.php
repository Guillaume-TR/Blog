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
				$commentId = (int) $reportComment;
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
			$this->view->render('episode', [
				'notfound' => true
			]);
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

	/** Disconnect page
	 *
	 */
	public function disconnect()
	{
		session_destroy();
		$this->view->render('disconnect', []);
	}
}