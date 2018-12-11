<?php

namespace App\app\controller;

use App\app\manager\EpisodeManager;
use App\app\manager\CommentManager;
use App\app\manager\AccountManager;
use App\app\model\View;

/** Control the backfront
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

	/** Admin panel
	 *
	 */
	public function admin()
	{
		$requestEpisodes = $this->episodeManage->getEpisodes();
		$requestReportComments = $this->commentManage->getReportComments();
		$requestAllComments = $this->commentManage->getAllComments();
		$requestAllAccounts = $this->accountManage->getAllAccounts();
		$this->view->render('home', [
			'episodes' => $requestEpisodes,
			'reportComments' => $requestReportComments,
			'comments' => $requestAllComments,
			'accounts' => $requestAllAccounts
		], true);
	}

	/** Add episode page
	 * @param $data
	 */
	public function addEpisode($data)
	{
		$message = null;
		$messageType = null;
		if (isset($_POST['submit'])) {
			if (isset($_POST['title']) && strlen($_POST['title']) > 0) {
				if (isset($_POST['content']) && strlen($_POST['content']) > 0) {
					$requestGet = $this->episodeManage->addEpisode($data);
					$message = 'L\'épisode a été ajouté !';
					$messageType = 'success';
				} else {
					$message = 'Le contenu de l\'épisode ne doit pas être vide.';
					$messageType = 'danger';
				}
			} else {
				$message = 'Veuillez entrer un titre';
				$messageType = 'danger';
			}
		}
		$this->view->render('addEpisode', [
			'episode' => $data,
			'message' => $message,
			'messageType' => $messageType
		], true);
	}

	/** Add account page
	 * @param $data
	 */
	public function addAccount($data)
	{
		$message = null;
		$messageType = null;
		if (isset($_POST['submit'])) {
			if (isset($_POST['username']) && strlen($_POST['username']) >= 5) {
				if (isset($_POST['password']) && isset($_POST['confirm'])
					&& strlen($_POST['password']) >= 5
					&& $_POST['password'] === $_POST['confirm']) {
					if (isset($_POST['level']) && $_POST['level'] === '1' || $_POST['level'] === '2') {
						$username = $_POST['username'];
						$requestGet = $this->accountManage->checkAccount($username);
						$countGet = $requestGet->rowCount();
						if ($countGet === 0) {
							$requestGet = $this->accountManage->addAccount($data);
							$message = 'Le compte a été ajouté.';
							$messageType = 'success';
						} else {
							$message = 'Ce nom d\'utilisateur existe déjà.';
							$messageType = 'danger';
						}
					} else {
						$message = 'Choisissez un niveau de permission.';
						$messageType = 'danger';
					}
				} else {
					$message = 'Verifiez que les mots de passe contient au moin 5 caractères et qu\'ils sont identique.';
					$messageType = 'danger';
				}
			} else {
				$message = 'Verifiez que le nom d\'utilisateur contient au moin 5 caractères';
				$messageType = 'danger';
			}
		}
		$this->view->render('addAccount', [
			'account' => $data,
			'message' => $message,
			'messageType' => $messageType
		], true);
	}

	/** Edit episode page
	 * @param $data
	 */
	public function editEpisode($data)
	{
		$message = null;
		$messageType = null;
		$idEpisode = (int)$_GET['id'];
		if (isset($_POST['submit'])) {
			if (isset($_POST['title']) && strlen($_POST['title']) > 0) {
				if (isset($_POST['content']) && strlen($_POST['content']) > 0) {
					$requestGet = $this->episodeManage->editEpisode($data, $idEpisode);
					$message = 'L\'épisode a été modifié !';
					$messageType = 'success';
				} else {
					$message = 'Le contenu de l\'épisode ne doit pas être vide.';
					$messageType = 'danger';
				}
			} else {
				$message = 'Veuillez entrer un titre';
				$messageType = 'danger';
			}
		}
		$request = $this->episodeManage->getEpisode($idEpisode);
		$requestEpisode = $request->fetch();
		$this->view->render('editEpisode', [
			'episodeEdit' => $data,
			'episode' => $requestEpisode,
			'message' => $message,
			'messageType' => $messageType
		], true);
	}

	/** Edit account page
	 * @param $data
	 */
	public function editAccount($data)
	{
		$message = null;
		$messageType = null;
		$idAccount = (int)$_GET['id'];
		if (isset($_POST['submit'])) {
			if (isset($_POST['password']) && isset($_POST['confirm'])
				&& strlen($_POST['password']) >= 5
				&& $_POST['password'] === $_POST['confirm']) {
				if (isset($_POST['level']) && $_POST['level'] === '1' || $_POST['level'] === '2') {
					$requestGet = $this->accountManage->editAccount($data, $idAccount);
					$message = 'Le compte a été modifié !';
					$messageType = 'success';
				} else {
					$message = 'Choisissez un niveau de permission.';
					$messageType = 'danger';
				}
			} else {
				$message = 'Verifiez que les mots de passe contient au moin 5 caractères et qu\'ils sont identique.';
				$messageType = 'danger';
			}
		}
		$request = $this->accountManage->getAccount($idAccount);
		$requestAccount = $request->fetch();
		$this->view->render('editAccount', [
			'accountEdit' => $data,
			'account' => $requestAccount,
			'message' => $message,
			'messageType' => $messageType
		], true);
	}

	/** Edit comment page
	 * @param $data
	 */
	public function editComment($data)
	{
		$message = null;
		$messageType = null;
		$idComment = (int)$_GET['id'];
		if (isset($_POST['submit'])) {
			if (isset($_POST['content']) && strlen($_POST['content']) > 0) {
				$requestGet = $this->commentManage->editComment($data, $idComment);
				$message = 'Le commentaire a été modifié !';
				$messageType = 'success';
			} else {
				$message = 'Le contenu du commentaire ne doit pas être vide.';
				$messageType = 'danger';
			}
		}
		$request = $this->commentManage->getComment($idComment);
		$requestComment = $request->fetch();
		$this->view->render('editComment', [
			'commentEdit' => $data,
			'comment' => $requestComment,
			'message' => $message,
			'messageType' => $messageType
		], true);
	}

	/** Delete episode page
	 * @param $data
	 */
	public function deleteEpisode($data)
	{
		$message = null;
		$messageType = null;
		$idEpisode = (int)$_GET['id'];

		$request = $this->episodeManage->getEpisode($idEpisode);
		$requestCount = $request->rowCount();
		if ($requestCount === 1) {
			$requestEpisode = $request->fetch();
			if (isset($_POST['submit'])) {
				if ($_POST['title'] === $requestEpisode->getTitle()) {
					$requestGet = $this->episodeManage->deleteEpisode($data, $idEpisode);
					$message = 'L\'épisode a été supprimé !';
					$messageType = 'success';
				} else {
					$message = 'Le titre n\'est pas le même.';
					$messageType = 'warning';
				}
			}
			$this->view->render('deleteEpisode', [
				'episode' => $requestEpisode,
				'message' => $message,
				'messageType' => $messageType
			], true);
		} else {
			$this->admin();
		}
	}

	/** Delete account page
	 * @param $data
	 */
	public function deleteAccount($data)
	{
		$message = null;
		$messageType = null;
		$idAccount = (int)$_GET['id'];

		$request = $this->accountManage->getAccount($idAccount);
		$requestCount = $request->rowCount();
		if ($requestCount === 1) {
			$requestAccount = $request->fetch();
			if (isset($_POST['submit'])) {
				if ($_POST['username'] === $requestAccount->getUser()) {
					$requestGet = $this->accountManage->deleteAccount($data, $idAccount);
					$message = 'L\'utilisateur a été supprimé !';
					$messageType = 'success';
				} else {
					$message = 'Le nom d\'utilisateur n\'est pas le même.';
					$messageType = 'warning';
				}
			}
			$this->view->render('deleteAccount', [
				'account' => $requestAccount,
				'message' => $message,
				'messageType' => $messageType
			], true);
		} else {
			$this->admin();
		}
	}

	/** Delete comment page
	 * @param $data
	 */
	public function deleteComment($data)
	{
		$message = null;
		$messageType = null;
		$idComment = (int)$_GET['id'];

		$request = $this->commentManage->getComment($idComment);
		$requestCount = $request->rowCount();
		if ($requestCount === 1) {
			$requestComment = $request->fetch();
			if (isset($_POST['submit'])) {
				if ($_POST['id'] === $requestComment->getId()) {
					$requestGet = $this->commentManage->deleteComment($data, $idComment);
					$message = 'Le commentaire a été supprimé !';
					$messageType = 'success';
				} else {
					$message = 'L\'identifiant du commentaire n\'est pas le même.';
					$messageType = 'warning';
				}
			}
			$this->view->render('deleteComment', [
				'comment' => $requestComment,
				'message' => $message,
				'messageType' => $messageType
			], true);
		} else {
			$this->admin();
		}
	}

}