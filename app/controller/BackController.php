<?php

namespace App\app\controller;

use App\app\manager\EpisodeManager;
use App\app\manager\CommentManager;
use App\app\manager\AccountManager;
use App\app\model\View;

/** Admin panel controller
 * Class BackController
 * @package App\app\controller
 */
class BackController
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
		$this->view = new View;
	}

	/** Home page
	 *
	 */
	public function admin()
	{
		$this->view->render('home', [], true);
	}

	/** Episode page
	 *
	 */
	public function episode()
	{
		$requestEpisodes = $this->episodeManage->getEpisodes();
		$this->view->render('episode', [
			'episodes' => $requestEpisodes
		], true);
	}

	/** Add episode page
	 * @param $data
	 */
	public function addEpisode($data)
	{
		extract($data);
		if (isset($submit)) {
			if (isset($title) && strlen($title) > 0) {
				if (isset($content) && strlen($content) > 0) {
					$requestGet = $this->episodeManage->addEpisode($data);
					$_SESSION['message'] = 'L\'épisode a été ajouté !';
					$_SESSION['messageType'] = 'success';
				} else {
					$_SESSION['message'] = 'Le contenu de l\'épisode ne doit pas être vide.';
					$_SESSION['messageType'] = 'danger';
				}
			} else {
				$_SESSION['message'] = 'Veuillez entrer un titre';
				$_SESSION['messageType'] = 'danger';
			}
		}
		$this->view->render('addEpisode', [
			'episode' => $data
		], true);
	}

	/** Edit episode page
	 * @param $data
	 */
	public function editEpisode($data)
	{
		extract($data);
		$idEpisode = (int)$_GET['id'];
		if (isset($submit)) {
			if (isset($title) && strlen($title) > 0) {
				if (isset($content) && strlen($content) > 0) {
					$requestGet = $this->episodeManage->editEpisode($data, $idEpisode);
					$_SESSION['message'] = 'L\'épisode a été modifié !';
					$_SESSION['messageType'] = 'success';
				} else {
					$_SESSION['message'] = 'Le contenu de l\'épisode ne doit pas être vide.';
					$_SESSION['messageType'] = 'danger';
				}
			} else {
				$_SESSION['message'] = 'Veuillez entrer un titre';
				$_SESSION['messageType'] = 'danger';
			}
		}
		$request = $this->episodeManage->getEpisode($idEpisode);
		$requestEpisode = $request->fetch();
		$this->view->render('editEpisode', [
			'episodeEdit' => $data,
			'episode' => $requestEpisode
		], true);
	}

	/** Delete episode page
	 * @param $data
	 */
	public function deleteEpisode($data)
	{
		extract($data);
		$idEpisode = (int)$_GET['id'];

		$request = $this->episodeManage->getEpisode($idEpisode);
		$requestCount = $request->rowCount();
		if ($requestCount === 1) {
			$requestEpisode = $request->fetch();
			if (isset($submit)) {
				if (isset($title) && $title === $requestEpisode->getTitle()) {
					$requestGet = $this->episodeManage->deleteEpisode($data, $idEpisode);
					$requestGet = $this->commentManage->deleteComments($data, $idEpisode);
					$_SESSION['message'] = 'L\'épisode a été supprimé !';
					$_SESSION['messageType'] = 'success';
				} else {
					$_SESSION['message'] = 'Le titre n\'est pas le même.';
					$_SESSION['messageType'] = 'warning';
				}
			}
			$this->view->render('deleteEpisode', [
				'episode' => $requestEpisode
			], true);
		} else {
			$this->admin();
		}
	}

	/** Account page
	 *
	 */
	public function account()
	{
		$requestAccounts = $this->accountManage->getAllAccounts();
		$this->view->render('account', [
			'accounts' => $requestAccounts
		], true);
	}

	/** Add account page
	 * @param $data
	 */
	public function addAccount($data)
	{
		extract($data);
		if (isset($submit)) {
			if (isset($username) && strlen($username) >= 5) {
				if (isset($password) && isset($confirm)
					&& strlen($password) >= 5
					&& $password === $confirm) {
					if (isset($level) && $level === '1' || $level === '2') {
						$username = $_POST['username'];
						$requestGet = $this->accountManage->checkAccount($username);
						$countGet = $requestGet->rowCount();
						if ($countGet === 0) {
							$requestGet = $this->accountManage->addAccount($data);
							$_SESSION['message'] = 'Le compte a été ajouté.';
							$_SESSION['messageType'] = 'success';
						} else {
							$_SESSION['message'] = 'Le nom d\'utilisateur existe déjà.';
							$_SESSION['messageType'] = 'danger';
						}
					} else {
						$_SESSION['message'] = 'Choisissez un niveau de permission.';
						$_SESSION['messageType'] = 'danger';
					}
				} else {
					$_SESSION['message'] = 'Vérifiez que les mots de passe contiennent au moins 5 caractères et qu\'ils sont identiques.';
					$_SESSION['messageType'] = 'danger';
				}
			} else {
				$_SESSION['message'] = 'Vérifiez que le nom d\'utilisateur contient au moins 5 caractères';
				$_SESSION['messageType'] = 'danger';
			}
		}
		$this->view->render('addAccount', [
			'account' => $data
		], true);
	}

	/** Edit account page
	 * @param $data
	 */
	public function editAccount($data)
	{
		extract($data);
		$idAccount = (int)$_GET['id'];
		if (isset($submit)) {
			if (isset($password) && isset($confirm)
				&& strlen($password) >= 5
				&& $password === $confirm) {
				if (isset($level) && $level === '1' || $level === '2') {
					$requestGet = $this->accountManage->editAccount($data, $idAccount);
					$_SESSION['message'] = 'Le compte a été modifié !';
					$_SESSION['messageType'] = 'success';
				} else {
					$_SESSION['message'] = 'Choisissez un niveau de permission.';
					$_SESSION['messageType'] = 'danger';
				}
			} else {
				$_SESSION['message'] = 'Verifiez que les mots de passe contiennent au moins 5 caractères et qu\'ils sont identiques.';
				$_SESSION['messageType'] = 'danger';
			}
		}
		$request = $this->accountManage->getAccount($idAccount);
		$requestAccount = $request->fetch();
		$this->view->render('editAccount', [
			'accountEdit' => $data,
			'account' => $requestAccount
		], true);
	}

	/** Delete account page
	 * @param $data
	 */
	public function deleteAccount($data)
	{
		extract($data);
		$idAccount = (int)$_GET['id'];

		$request = $this->accountManage->getAccount($idAccount);
		$requestCount = $request->rowCount();
		if ($requestCount === 1) {
			$requestAccount = $request->fetch();
			if (isset($submit)) {
				if (isset($username) && $username === $requestAccount->getUser()) {
					$requestGet = $this->accountManage->deleteAccount($data, $idAccount);
					$_SESSION['message'] = 'L\'utilisateur a été supprimé !';
					$_SESSION['messageType'] = 'success';
				} else {
					$_SESSION['message'] = 'Le nom d\'utilisateur n\'est pas le même.';
					$_SESSION['messageType'] = 'warning';
				}
			}
			$this->view->render('deleteAccount', [
				'account' => $requestAccount
			], true);
		} else {
			$this->admin();
		}
	}

	/** Comment page
	 * @param $id
	 */
	public function comment($id = null)
	{
		$requestComments = null;
		$requestCommentsReport = $this->commentManage->getReportComments();
		if (isset($id)) {
			$requestComments = $this->commentManage->getComments($id);
		}
		$requestEpisodes = $this->episodeManage->getEpisodes();
		$this->view->render('comment', [
			'episodes' => $requestEpisodes,
			'comments' => $requestComments,
			'commentsReport' => $requestCommentsReport
		], true);
	}

	/** Approve comment page
	 * @param $data
	 * @param $idComment
	 */
	public function approveComment($data, $idComment)
	{
		extract($data);
		if (isset($submit)) {
			$requestGet = $this->commentManage->approveComment($data, $idComment);
			$_SESSION['message'] = 'Le commentaire a été approuvé !';
			$_SESSION['messageType'] = 'success';
		}
		$request = $this->commentManage->getComment($idComment);
		$requestComment = $request->fetch();
		$this->view->render('approveComment', [
			'comment' => $requestComment
		], true);
	}

	/** Delete comment page
	 * @param $data
	 */
	public function deleteComment($data)
	{
		extract($data);
		$idComment = (int)$_GET['id'];

		$request = $this->commentManage->getComment($idComment);
		$requestCount = $request->rowCount();
		if ($requestCount === 1) {
			$requestComment = $request->fetch();
			if (isset($submit)) {
				if (isset($id) && $id === $requestComment->getId()) {
					$requestGet = $this->commentManage->deleteComment($data, $idComment);
					$_SESSION['message'] = 'Le commentaire a été supprimé !';
					$_SESSION['messageType'] = 'success';
				} else {
					$_SESSION['message'] = 'L\'identifiant du commentaire n\'est pas le même.';
					$_SESSION['messageType'] = 'warning';
				}
			}
			$this->view->render('deleteComment', [
				'comment' => $requestComment
			], true);
		} else {
			$this->admin();
		}
	}

}